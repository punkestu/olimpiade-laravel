<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB as FacadesDB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'olimpiade_id',
        'login_id',
        'finish',
        'finish_time',
        'poin',
        'is_login',
        'sent_email',
        'asal_sekolah',
        'kelas',
        'nomor_hp',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function olimpiade()
    {
        return $this->belongsTo(Olimpiade::class);
    }

    public function point()
    {
        return $this->hasMany(Answer::class)->join('questions', 'question_id', '=', 'questions.id')->where('questions.correct_answer', FacadesDB::raw('answers.answer'));
    }

    public function minusPoint()
    {
        return $this->hasMany(Answer::class)->join('questions', 'question_id', '=', 'questions.id')->where('questions.correct_answer', '!=', FacadesDB::raw('answers.answer'));
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function monitors()
    {
        return $this->hasMany(Monitor::class);
    }

    public function notfocus()
    {
        return $this->hasMany(Monitor::class)->where('message', '=', 'hidden');
    }

    public function notfullscreen()
    {
        return $this->hasMany(Monitor::class)->where('message', '=', 'windowed');
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
