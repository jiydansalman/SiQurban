<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProgress extends Model
{
    use HasFactory;

    protected $fillable = ['saving_id', 'status'];

    public function saving()
    {
        return $this->belongsTo(Saving::class);
    }
}
