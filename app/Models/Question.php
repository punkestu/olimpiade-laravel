<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'olimpiade_id',
        'question',
        'answer1',
        'answer2',
        'answer3',
        'answer4',
        'correct_answer',
        'poin'
    ];
}
