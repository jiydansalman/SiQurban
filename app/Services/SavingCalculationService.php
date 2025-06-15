<?php

// app/Services/SavingCalculationService.php
namespace App\Services;

use Carbon\Carbon;

class SavingCalculationService
{
    private const TARGET_DATE = '2026-05-27';
    
    /**
     * Calculate saving amounts for a package
     */
    public static function calculate($packagePrice)
    {
        $targetDate = Carbon::createFromFormat('Y-m-d', self::TARGET_DATE);
        $now = Carbon::now();
        
        $weeksRemaining = floor($now->diffInWeeks($targetDate));
        $monthsRemaining = floor($now->diffInMonths($targetDate));
        
        // Konsisten - selalu gunakan ceil()
        $weeklyAmount = $weeksRemaining > 0 ? ceil($packagePrice / $weeksRemaining) : $packagePrice;
        $monthlyAmount = $monthsRemaining > 0 ? ceil($packagePrice / $monthsRemaining) : $packagePrice;
        
        return [
            'target_date' => $targetDate,
            'weeks_remaining' => $weeksRemaining,
            'months_remaining' => $monthsRemaining,
            'weekly_amount' => $weeklyAmount,
            'monthly_amount' => $monthlyAmount
        ];
    }
    
    /**
     * Get target date
     */
    public static function getTargetDate()
    {
        return Carbon::createFromFormat('Y-m-d', self::TARGET_DATE);
    }
}

?>