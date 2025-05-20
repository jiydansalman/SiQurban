<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['admin_id', 'title', 'content'];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
