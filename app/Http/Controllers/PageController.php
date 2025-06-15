<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Saving; // Ganti dari Transactions ke Saving
use App\Models\Packages;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }
    
    public function packages()
    {
        return view('packages');
    }
    
    public function dashboard()
    {
        return view('dashboard');
    }

    public function tabunganku(Request $request): View
    {
        $user = auth()->user();
    
        // Get current active saving - gunakan model Saving
        $currentSaving = Saving::with('package')
            ->where('user_id', $user->id)
            ->where('status', 'active')
            ->first();
    
        // Get recommended packages - fix field dari packages_id ke package_id
        $excludeId = $currentSaving ? $currentSaving->package_id : null;
        $recommendedPackages = Packages::when($excludeId, function($query, $excludeId) {
            $query->where('id', '!=', $excludeId);
        })->take(3)->get();
    
        return view('tabunganku', compact('currentSaving', 'recommendedPackages'));
    }

    public function updateTabungan(Request $request, $id): RedirectResponse
    {
        $saving = Saving::where('user_id', auth()->id())->findOrFail($id);
    
        $validated = $request->validate([
            'delivery_location' => 'required|in:Rumah,Masjid',
            'delivery_address' => 'required|string'
        ]);
    
        $saving->update($validated);
    
        return redirect()->route('tabunganku')->with('success', 'Informasi berhasil diupdate!');
    }

    public function makePayment($id): RedirectResponse
    {
        $saving = Saving::where('user_id', auth()->id())
            ->where('status', 'active')
            ->findOrFail($id);
        
        // Check if can make payment
        if ($saving->completed_periods >= $saving->total_periods) {
            return redirect()->back()->with('error', 'Tabungan sudah selesai.');
        }
    
        // Simulate payment - gunakan amount_saved bukan total_saved
        $saving->increment('completed_periods');
        $saving->increment('amount_saved', $saving->amount_per_period);
    
        // Check if saving is completed
        if ($saving->completed_periods >= $saving->total_periods) {
            $saving->update(['status' => 'completed']);
        }
    
        return redirect()->back()->with('success', 'Pembayaran berhasil!');
    }
}