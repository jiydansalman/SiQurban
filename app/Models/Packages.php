<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Packages extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'price',
        'description',
        'image_path',
        'is_active',
        'specifications'
    ];
    
    protected $casts = [
        'price' => 'integer',
        'is_active' => 'boolean',
        'specifications' => 'array'
    ];
    
    // Default attributes
    protected $attributes = [
        'is_active' => true,
    ];

    /**
     * Relationship dengan Saving model
     */
    public function savings()
    {
        return $this->hasMany(Saving::class, 'package_id');
    }
    
    /**
     * Get formatted price
     */
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }
    
    /**
     * Scope untuk active packages
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
    
    /**
     * Scope untuk popular packages (berdasarkan jumlah savings)
     */
    public function scopePopular($query, $limit = 6)
    {
        return $query->withCount(['savings' => function($query) {
                $query->where('status', '!=', 'cancelled');
            }])
            ->orderBy('savings_count', 'desc')
            ->limit($limit);
    }
    
    /**
     * Scope untuk filter by type
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }
    
    /**
     * Get total users who have saved for this package
     */
    public function getTotalSaversAttribute()
    {
        return $this->savings()->distinct('user_id')->count();
    }
    
    /**
     * Get total amount saved for this package
     */
    public function getTotalAmountSavedAttribute()
    {
        return $this->savings()->sum('amount_saved');
    }
}