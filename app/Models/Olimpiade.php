<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Olimpiade extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'start_date',
        'end_date',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
