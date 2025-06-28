<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use App\Models\Packages;
use App\Models\Saving;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display dashboard statistics
     */
    public function statistik(): View
    {
        try {
            // Debug: Cek apakah model bisa diakses
            Log::info('Dashboard: Starting to load statistics');
            
            // Statistik utama dengan fallback values
            $totalUsers = User::count() ?? 0;
            $totalSavings = Saving::sum('amount_saved') ?? 0;
            $completedQurban = Saving::where('status', 'completed')->count() ?? 0;
            $activePackages = Packages::count() ?? 0; // Hapus where is_active dulu untuk debug
            $activeUsers = Saving::where('status', 'active')->distinct('user_id')->count() ?? 0;

            // Debug: Log nilai-nilai
            Log::info('Dashboard stats:', [
                'totalUsers' => $totalUsers,
                'totalSavings' => $totalSavings,
                'completedQurban' => $completedQurban,
                'activePackages' => $activePackages,
                'activeUsers' => $activeUsers
            ]);

            // Statistik pertumbuhan dengan fallback
            $currentMonth = Carbon::now()->startOfMonth();
            $lastMonth = Carbon::now()->subMonth()->startOfMonth();
            
            $currentMonthUsers = User::where('created_at', '>=', $currentMonth)->count() ?? 0;
            $lastMonthUsers = User::whereBetween('created_at', [$lastMonth, $currentMonth])->count() ?? 0;
            $userGrowthPercentage = $lastMonthUsers > 0 ? round(($currentMonthUsers - $lastMonthUsers) / $lastMonthUsers * 100, 1) : 0;

            $currentMonthSavings = Saving::where('created_at', '>=', $currentMonth)->sum('amount_saved') ?? 0;
            $lastMonthSavings = Saving::whereBetween('created_at', [$lastMonth, $currentMonth])->sum('amount_saved') ?? 0;
            $savingsGrowthPercentage = $lastMonthSavings > 0 ? round(($currentMonthSavings - $lastMonthSavings) / $lastMonthSavings * 100, 1) : 0;

            $currentWeekCompleted = Saving::where('status', 'completed')
                ->where('updated_at', '>=', Carbon::now()->startOfWeek())
                ->count() ?? 0;

            // Data untuk grafik - simplified
            $chartData = [];
            try {
                for ($i = 6; $i >= 0; $i--) {
                    $date = Carbon::now()->subDays($i);
                    $dailySavings = Saving::whereDate('created_at', $date)->sum('amount_saved') ?? 0;
                    $chartData[] = [
                        'day' => $date->format('D'),
                        'date' => $date->format('Y-m-d'),
                        'amount' => $dailySavings,
                        'percentage' => 20 // Default percentage for now
                    ];
                }

                // Normalisasi data chart
                $maxAmount = collect($chartData)->max('amount');
                if ($maxAmount > 0) {
                    foreach ($chartData as &$data) {
                        $data['percentage'] = round(($data['amount'] / $maxAmount) * 100);
                    }
                }
            } catch (\Exception $e) {
                Log::error('Chart data error: ' . $e->getMessage());
                $chartData = [];
            }

            // Distribusi jenis hewan - simplified
            $animalData = [];
            try {
                $animalDistribution = Packages::select('type', DB::raw('count(*) as count'))
                    ->join('savings', 'packages.id', '=', 'savings.package_id')
                    ->where('savings.status', '!=', 'cancelled')
                    ->groupBy('type')
                    ->get();

                $totalAnimals = $animalDistribution->sum('count');
                $colors = [
                    'Kambing' => 'bg-green-500',
                    'Domba' => 'bg-blue-500', 
                    'Sapi' => 'bg-purple-500',
                    'Unta' => 'bg-orange-500'
                ];

                foreach ($animalDistribution as $item) {
                    $percentage = $totalAnimals > 0 ? round(($item->count / $totalAnimals) * 100) : 0;
                    $animalData[] = [
                        'type' => $item->type,
                        'count' => $item->count,
                        'percentage' => $percentage,
                        'color' => $colors[$item->type] ?? 'bg-gray-500'
                    ];
                }
            } catch (\Exception $e) {
                Log::error('Animal distribution error: ' . $e->getMessage());
                $animalData = [];
            }

            // Aktivitas terbaru - simplified
            $recentActivities = [];
            try {
                $completedSavings = Saving::with(['user', 'package'])
                    ->where('status', 'completed')
                    ->where('updated_at', '>=', Carbon::now()->subHours(24))
                    ->orderByDesc('updated_at')
                    ->limit(2)
                    ->get();

                foreach ($completedSavings as $saving) {
                    if ($saving->user && $saving->package) {
                        $recentActivities[] = [
                            'user' => $saving->user->full_name ?? $saving->user->username,
                            'action' => 'menyelesaikan tabungan',
                            'package' => $saving->package->name,
                            'time' => $saving->updated_at->diffForHumans(),
                            'icon' => 'check',
                            'color' => 'text-green-500'
                        ];
                    }
                }
            } catch (\Exception $e) {
                Log::error('Recent activities error: ' . $e->getMessage());
                $recentActivities = [];
            }

            // Top performers - simplified
            $topUsers = [];
            try {
                $topUsersData = Saving::select('users.username', 'users.full_name', DB::raw('SUM(savings.amount_saved) as total_saved'))
                    ->join('users', 'savings.user_id', '=', 'users.id')
                    ->where('savings.created_at', '>=', $currentMonth)
                    ->groupBy('users.id', 'users.username', 'users.full_name')
                    ->orderByDesc('total_saved')
                    ->limit(4)
                    ->get();

                foreach ($topUsersData as $index => $user) {
                    $progress = $totalSavings > 0 ? min(100, round(($user->total_saved / $totalSavings) * 100)) : 0;
                    $topUsers[] = [
                        'name' => $user->full_name ?? $user->username,
                        'savings' => $user->total_saved,
                        'progress' => $progress,
                        'rank' => $index + 1
                    ];
                }
            } catch (\Exception $e) {
                Log::error('Top users error: ' . $e->getMessage());
                $topUsers = [];
            }

            // Compact semua data - pastikan semua variable ada
            $data = compact(
                'totalUsers',
                'totalSavings', 
                'completedQurban',
                'activePackages',
                'activeUsers',
                'userGrowthPercentage',
                'savingsGrowthPercentage',
                'currentWeekCompleted',
                'chartData',
                'animalData',
                'recentActivities',
                'topUsers'
            );

            Log::info('Dashboard: Data prepared successfully', $data);

            return view('dashboard.statistik', $data);

        } catch (\Exception $e) {
            Log::error('Dashboard statistics error: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            // Fallback data dengan semua variabel yang diperlukan
            $fallbackData = [
                'totalUsers' => 0,
                'totalSavings' => 0,
                'completedQurban' => 0,
                'activePackages' => 0,
                'activeUsers' => 0,
                'userGrowthPercentage' => 0,
                'savingsGrowthPercentage' => 0,
                'currentWeekCompleted' => 0,
                'chartData' => [],
                'animalData' => [],
                'recentActivities' => [],
                'topUsers' => []
            ];
            
            return view('dashboard.statistik', $fallbackData);
        }
    }

    /**
     * Get live statistics via AJAX
     */
    public function getLiveStatistics(): JsonResponse
    {
        try {
            $statistics = [
                'totalUsers' => User::count(),
                'totalSavings' => Saving::sum('amount_saved'),
                'completedQurban' => Saving::where('status', 'completed')->count(),
                'activePackages' => Packages::count(),
                'activeUsers' => Saving::where('status', 'active')->distinct('user_id')->count(),
                'updated_at' => now()->toISOString()
            ];

            return response()->json([
                'success' => true,
                'data' => $statistics
            ]);

        } catch (\Exception $e) {
            Log::error('Live statistics error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch statistics',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get chart data for specific period
     */
    public function getChartData(Request $request): JsonResponse
    {
        try {
            $period = $request->get('period', '7days');
            $chartData = [];

            switch ($period) {
                case '7days':
                    for ($i = 6; $i >= 0; $i--) {
                        $date = Carbon::now()->subDays($i);
                        $dailySavings = Saving::whereDate('created_at', $date)->sum('amount_saved');
                        $chartData[] = [
                            'label' => $date->format('D'),
                            'date' => $date->format('Y-m-d'),
                            'value' => $dailySavings
                        ];
                    }
                    break;

                case '30days':
                    for ($i = 29; $i >= 0; $i--) {
                        $date = Carbon::now()->subDays($i);
                        $dailySavings = Saving::whereDate('created_at', $date)->sum('amount_saved');
                        $chartData[] = [
                            'label' => $date->format('m/d'),
                            'date' => $date->format('Y-m-d'),
                            'value' => $dailySavings
                        ];
                    }
                    break;

                case '3months':
                    for ($i = 11; $i >= 0; $i--) {
                        $date = Carbon::now()->subWeeks($i);
                        $weeklySavings = Saving::whereBetween('created_at', [
                            $date->startOfWeek()->toDateString(),
                            $date->endOfWeek()->toDateString()
                        ])->sum('amount_saved');
                        
                        $chartData[] = [
                            'label' => $date->format('M W'),
                            'date' => $date->format('Y-m-d'),
                            'value' => $weeklySavings
                        ];
                    }
                    break;
            }

            // Normalize data for percentage display
            $maxValue = collect($chartData)->max('value');
            if ($maxValue > 0) {
                foreach ($chartData as &$data) {
                    $data['percentage'] = round(($data['value'] / $maxValue) * 100);
                }
            }

            return response()->json([
                'success' => true,
                'data' => $chartData
            ]);

        } catch (\Exception $e) {
            Log::error('Chart data error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch chart data'
            ], 500);
        }
    }
}