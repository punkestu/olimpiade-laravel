<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    protected $fillable = [
        'user_id',
        'code',
        'message',
        'data',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
