<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['saving_id', 'amount', 'paid_at'];

    public function saving()
    {
        return $this->belongsTo(Saving::class);
    }
}

