<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reminders extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'message', 
        'is_sent', 
        'remind_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
