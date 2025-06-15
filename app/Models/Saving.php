<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    use HasFactory;

    // Sesuaikan dengan tabel yang dibuat di migration (savings)
    protected $table = 'savings';

    protected $fillable = [
        'user_id', 
        'package_id', 
        'amount_saved',
        'delivery_location', 
        'delivery_address',
        'saving_type',
        'amount_per_period',
        'target_date',
        'total_periods',
        'completed_periods',
        'status'
    ];

    protected $casts = [
        'target_date' => 'date',
        'amount_per_period' => 'decimal:2',
        'amount_saved' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Packages::class, 'package_id');
    }

    // Helper methods untuk progress (fix reference ke package bukan qurban)
    public function getProgressPercentageAttribute()
    {
        if (!$this->package) return 0;
        return ($this->amount_saved / $this->package->price) * 100;
    }

    public function getRemainingAmountAttribute()
    {
        if (!$this->package) return 0;
        return $this->package->price - $this->amount_saved;
    }

    public function getRemainingPeriodsAttribute()
    {
        return $this->total_periods - $this->completed_periods;
    }

    public function getTotalSavedAttribute()
    {
        return $this->amount_saved;
    }
}