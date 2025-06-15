<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Packages;
use App\Models\Saving;
use Carbon\Carbon;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Packages::all();
        return view('packages.index', compact('packages'));
    }
    
    public function adminIndex()
    {
        $packages = Packages::all();
        return view('dashboard.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('dashboard.packages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'required|integer',
            'description' => 'nullable',
            'image' => 'required|image'
        ]);

        $imagePath = $request->file('image')->store('packages', 'public');

        Packages::create([
            'name' => $validated['name'],
            'type' => $validated['type'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.packages.index')->with('success', 'Package berhasil ditambahkan!');
    }

    public function show($id)
    {
        $package = Packages::findOrFail($id);
    
        $targetDate = Carbon::create(2026, 5, 27);
        $now = Carbon::now();
    
        $weeksRemaining = floor($now->diffInWeeks($targetDate));
        $monthsRemaining = floor($now->diffInMonths($targetDate));
    
        $weeklyAmount = $weeksRemaining > 0 ? $package->price / $weeksRemaining : $package->price;
        $monthlyAmount = $monthsRemaining > 0 ? $package->price / $monthsRemaining : $package->price;
    
        // Get recommended packages (different type, exclude current)
        $recommendedPackages = Packages::where('id', '!=', $id)
            ->where('type', '!=', $package->type)
            ->take(3)
            ->get();
    
        return view('packages.detail', compact(
            'package', 
            'weeksRemaining', 
            'monthsRemaining', 
            'weeklyAmount', 
            'monthlyAmount',
            'recommendedPackages',
            'targetDate'
        ));
    }

    // Method baru untuk menyimpan data tabungan
    public function storeSaving(Request $request)
    {
        $validated = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'payment_method' => 'required|string',
            'delivery_location' => 'required|in:rumah,masjid',
            'saving_method' => 'required|in:weekly,monthly',
            'address' => 'required|string'
        ]);

        // Get package details
        $package = Packages::findOrFail($validated['package_id']);
        
        // Calculate saving details
        $targetDate = Carbon::create(2026, 5, 27); 
        $today = Carbon::now();
        
        $weeksRemaining = floor($today->diffInWeeks($targetDate));
        $monthsRemaining = floor($today->diffInMonths($targetDate));
    
        $weeklyAmount = $weeksRemaining > 0 ? $package->price / $weeksRemaining : $package->price;
        $monthlyAmount = $monthsRemaining > 0 ? $package->price / $monthsRemaining : $package->price;

        
        if ($validated['saving_method'] === 'weekly') {
            $totalPeriods = max(1, $weeksRemaining); 
            $amountPerPeriod = $weeklyAmount;
            $savingType = 'weekly';
        } else {
            $totalPeriods = max(1, $monthsRemaining); // Minimal 1 bulan
            $amountPerPeriod = $monthlyAmount;
            $savingType = 'monthly';
        }

        // Check if user already has active saving
        $existingSaving = Saving::where('user_id', auth()->id())
            ->where('status', 'active')
            ->first();

        if ($existingSaving) {
            return redirect()->route('tabunganku')->with('error', 'Anda sudah memiliki tabungan aktif. Selesaikan terlebih dahulu sebelum memulai yang baru.');
        }

        // Create new saving
        $saving = Saving::create([
            'user_id' => auth()->id(),
            'package_id' => $validated['package_id'],
            'amount_saved' => 0,
            'delivery_location' => ucfirst($validated['delivery_location']),
            'delivery_address' => $validated['address'],
            'saving_type' => $savingType,
            'amount_per_period' => $amountPerPeriod,
            'target_date' => $targetDate,
            'total_periods' => $totalPeriods,
            'completed_periods' => 0,
            'status' => 'active'
        ]);

        return redirect()->route('tabunganku')->with('success', 'Tabungan qurban berhasil dimulai! Mulai menabung sekarang.');
    }
}