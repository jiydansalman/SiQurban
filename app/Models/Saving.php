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
    
    // Default attributes
    protected $attributes = [
        'status' => 'active',
        'completed_periods' => 0,
        'amount_saved' => 0,
    ];

    /**
     * Relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Packages::class, 'package_id');
    }

    /**
     * Computed attributes - Enhanced dengan null checks
     */
    public function getProgressPercentageAttribute()
    {
        if (!$this->package || $this->package->price <= 0) return 0;
        return min(100, ($this->amount_saved / $this->package->price) * 100);
    }

    public function getRemainingAmountAttribute()
    {
        if (!$this->package) return 0;
        return max(0, $this->package->price - $this->amount_saved);
    }

    public function getRemainingPeriodsAttribute()
    {
        return max(0, $this->total_periods - $this->completed_periods);
    }

    // Legacy method - keep for backward compatibility
    public function getTotalSavedAttribute()
    {
        return $this->amount_saved;
    }
    
    /**
     * New computed attributes
     */
    public function getIsCompletedAttribute()
    {
        return $this->status === 'completed' || 
               $this->completed_periods >= $this->total_periods ||
               ($this->package && $this->amount_saved >= $this->package->price);
    }
    
    public function getFormattedAmountSavedAttribute()
    {
        return 'Rp ' . number_format($this->amount_saved, 0, ',', '.');
    }
    
    public function getFormattedRemainingAmountAttribute()
    {
        return 'Rp ' . number_format($this->remaining_amount, 0, ',', '.');
    }
    
    public function getNextPaymentAmountAttribute()
    {
        return ceil($this->amount_per_period / 1000) * 1000; // Round up to nearest thousand
    }

    /**
     * Scopes
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
    
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }
    
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
    
    public function scopeWeekly($query)
    {
        return $query->where('saving_type', 'weekly');
    }
    
    public function scopeMonthly($query)
    {
        return $query->where('saving_type', 'monthly');
    }

    /**
     * Helper methods
     */
    public function canMakePayment()
    {
        return $this->status === 'active' && 
               $this->completed_periods < $this->total_periods &&
               ($this->package && $this->amount_saved < $this->package->price);
    }
    
    public function makePayment($amount = null)
    {
        if (!$this->canMakePayment()) {
            return false;
        }
        
        $paymentAmount = $amount ?? $this->next_payment_amount;
        
        $this->increment('amount_saved', $paymentAmount);
        $this->increment('completed_periods');
        
        // Check if saving is now complete
        if ($this->completed_periods >= $this->total_periods || 
            ($this->package && $this->amount_saved >= $this->package->price)) {
            $this->update(['status' => 'completed']);
        }
        
        return true;
    }
    
    public function calculateOptimalPaymentSchedule()
    {
        if (!$this->package) return null;
        
        $remainingAmount = $this->remaining_amount;
        $remainingPeriods = $this->remaining_periods;
        
        if ($remainingPeriods <= 0) return null;
        
        return [
            'amount_per_period' => ceil(($remainingAmount / $remainingPeriods) / 1000) * 1000,
            'total_periods' => $remainingPeriods,
            'estimated_completion' => now()->addWeeks($this->saving_type === 'weekly' ? $remainingPeriods : $remainingPeriods * 4)
        ];
    }
}