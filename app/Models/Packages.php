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
        'image_path'
    ];

    public function transactions()
    {
        return $this->hasMany(transactions::class);
    }
}
