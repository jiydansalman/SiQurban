<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'qurban_id', 'amount_saved'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function qurban()
    {
        return $this->belongsTo(Qurban::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function progress()
    {
        return $this->hasOne(Progress::class);
    }
}

