<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use App\Models\Saving;
use App\Models\Packages; // Sesuaikan dengan model yang sudah ada
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    /**
     * Display home page with enhanced statistics and popular packages
     */
    public function home(): View
    {
        try {
            // Get live statistics dari database
            $totalUsers = User::count();
            $totalSavings = Saving::sum('amount_saved');
            $successfulQurban = Saving::where('status', 'completed')->count();
            $availablePackages = Packages::count();
            
            // Get popular packages (top 6 based on savings count)
            // Assuming ada relationship, kalau belum bisa pakai random atau berdasarkan created_at
            $popularPackages = Packages::withCount(['savings' => function($query) {
                    $query->where('status', '!=', 'cancelled');
                }])
                ->orderBy('savings_count', 'desc')
                ->take(6)
                ->get();
            
            // Jika relationship belum ada, fallback ke random packages
            if ($popularPackages->isEmpty()) {
                $popularPackages = Packages::inRandomOrder()->take(6)->get();
            }
            
            // Get current user's active saving if authenticated
            $userSaving = null;
            if (auth()->check()) {
                $userSaving = Saving::with('package')
                    ->where('user_id', auth()->id())
                    ->where('status', 'active')
                    ->first();
            }
            
            return view('home', compact(
                'totalUsers',
                'totalSavings', 
                'successfulQurban',
                'availablePackages',
                'popularPackages',
                'userSaving'
            ));
            
        } catch (\Exception $e) {
            Log::error('Home page error: ' . $e->getMessage());
            
            // Fallback values jika ada error
            return view('home', [
                'totalUsers' => 0,
                'totalSavings' => 0,
                'successfulQurban' => 0,
                'availablePackages' => 0,
                'popularPackages' => collect(),
                'userSaving' => null
            ]);
        }
    }
    
    /**
     * Display packages page
     */
    public function packages(): View
    {
        try {
            $packages = Packages::orderBy('created_at', 'desc')->get();
            return view('packages', compact('packages'));
            
        } catch (\Exception $e) {
            Log::error('Packages page error: ' . $e->getMessage());
            return view('packages', ['packages' => collect()]);
        }
    }
    
    /**
     * Display dashboard page
     */
    public function dashboard(): View
    {
        return view('dashboard.statistik');
    }

    /**
     * Display tabunganku page with enhanced features
     */
    public function tabunganku(Request $request): View
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        try {
            $user = auth()->user();
        
            // Get current active saving
            $currentSaving = Saving::with('package')
                ->where('user_id', $user->id)
                ->where('status', 'active')
                ->first();
        
            // Get recommended packages (excluding current if exists)
            $excludeId = $currentSaving ? $currentSaving->package_id : null;
            $recommendedPackages = Packages::when($excludeId, function($query, $excludeId) {
                $query->where('id', '!=', $excludeId);
            })->inRandomOrder()->take(3)->get();
        
            return view('tabunganku', compact('currentSaving', 'recommendedPackages'));
            
        } catch (\Exception $e) {
            Log::error('Tabunganku page error: ' . $e->getMessage());
            return view('tabunganku', [
                'currentSaving' => null,
                'recommendedPackages' => collect()
            ]);
        }
    }

    /**
     * Update tabungan information
     */
    public function updateTabungan(Request $request, $id): RedirectResponse
    {
        try {
            $saving = Saving::where('user_id', auth()->id())->findOrFail($id);
        
            $validated = $request->validate([
                'delivery_location' => 'required|in:Rumah,Masjid',
                'delivery_address' => 'required|string|max:500'
            ]);
        
            $saving->update($validated);
        
            return redirect()->route('tabunganku')->with('success', 'Informasi berhasil diupdate!');
            
        } catch (\Exception $e) {
            Log::error('Update tabungan error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal mengupdate informasi');
        }
    }

    /**
     * Enhanced payment processing with better error handling
     */
    public function makePayment($id): JsonResponse|RedirectResponse
    {
        try {
            $saving = Saving::where('user_id', auth()->id())
                ->where('status', 'active')
                ->findOrFail($id);
            
            // Check if can make payment
            if ($saving->completed_periods >= $saving->total_periods) {
                if (request()->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Tabungan sudah selesai'
                    ]);
                }
                return redirect()->back()->with('error', 'Tabungan sudah selesai.');
            }

            DB::beginTransaction();
            
            try {
                // Calculate payment amount (bisa disesuaikan dengan logic bisnis)
                $paymentAmount = $saving->amount_per_period;
                
                // Update saving
                $saving->increment('completed_periods');
                $saving->increment('amount_saved', $paymentAmount);
        
                // Check if saving is completed
                if ($saving->completed_periods >= $saving->total_periods || 
                    $saving->amount_saved >= $saving->package->price) {
                    $saving->update(['status' => 'completed']);
                }

                DB::commit();

                if (request()->expectsJson()) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Pembayaran berhasil!',
                        'data' => [
                            'amount' => $paymentAmount,
                            'new_total' => $saving->fresh()->amount_saved,
                            'completed_periods' => $saving->fresh()->completed_periods,
                            'is_completed' => $saving->fresh()->status === 'completed'
                        ]
                    ]);
                }
        
                return redirect()->back()->with('success', 'Pembayaran berhasil!');
                
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
            
        } catch (\Exception $e) {
            Log::error('Payment error: ' . $e->getMessage());
            
            if (request()->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat memproses pembayaran'
                ], 500);
            }
            
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses pembayaran');
        }
    }

    /**
     * Get live statistics for AJAX calls
     */
    public function getStatistics(): JsonResponse
    {
        try {
            $statistics = [
                'totalUsers' => User::count(),
                'totalSavings' => Saving::sum('amount_saved'),
                'successfulQurban' => Saving::where('status', 'completed')->count(),
                'availablePackages' => Packages::count(),
                'updated_at' => now()->toISOString()
            ];
            
            return response()->json($statistics);
            
        } catch (\Exception $e) {
            Log::error('Statistics API error: ' . $e->getMessage());
            
            return response()->json([
                'totalUsers' => 0,
                'totalSavings' => 0,
                'successfulQurban' => 0,
                'availablePackages' => 0,
                'error' => 'Failed to load statistics'
            ], 500);
        }
    }

    /**
     * Search packages for AJAX autocomplete
     */
    public function searchPackages(Request $request): JsonResponse
    {
        try {
            $query = $request->get('q', '');
            
            if (strlen($query) < 2) {
                return response()->json(['packages' => []]);
            }
            
            $packages = Packages::where(function($q) use ($query) {
                    $q->where('name', 'LIKE', "%{$query}%")
                      ->orWhere('type', 'LIKE', "%{$query}%")
                      ->orWhere('description', 'LIKE', "%{$query}%");
                })
                ->select('id', 'name', 'type', 'price', 'image_path')
                ->limit(10)
                ->get();
            
            return response()->json(['packages' => $packages]);
            
        } catch (\Exception $e) {
            Log::error('Package search API error: ' . $e->getMessage());
            
            return response()->json([
                'packages' => [],
                'error' => 'Search failed'
            ], 500);
        }
    }

    /**
     * Get popular packages for AJAX loading
     */
    public function getPopularPackages(): JsonResponse
    {
        try {
            $packages = Packages::withCount(['savings' => function($query) {
                    $query->where('status', '!=', 'cancelled');
                }])
                ->orderBy('savings_count', 'desc')
                ->select('id', 'name', 'type', 'price', 'description', 'image_path')
                ->take(6)
                ->get()
                ->map(function($package) {
                    // Ensure image path is properly formatted
                    $package->image_path = $package->image_path ?? 'packages/default.jpg';
                    return $package;
                });
            
            // Fallback jika relationship belum ada
            if ($packages->isEmpty()) {
                $packages = Packages::inRandomOrder()
                    ->select('id', 'name', 'type', 'price', 'description', 'image_path')
                    ->take(6)
                    ->get();
            }
            
            return response()->json(['packages' => $packages]);
            
        } catch (\Exception $e) {
            Log::error('Popular packages API error: ' . $e->getMessage());
            
            return response()->json([
                'packages' => [],
                'error' => 'Failed to load popular packages'
            ], 500);
        }
    }

    /**
     * Legacy method for backward compatibility
     * @deprecated Use home() instead
     */
    public function index(): View
    {
        return $this->home();
    }
}