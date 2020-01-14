<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the centros for the user.
     */
    public function centros()
    {
        return $this->hasMany('App\Centro', 'coordinador');
    }

    public function matriculas() {
        return $this->hasMany('App\Matricula', 'alumno');
    }

    public function tutorado() {
        return $this->hasMany('App\Tutorizado', 'tutorado');
    }

    public function tutor() {
        return $this->hasOne('App\Tutorizado', 'tutor');
    }
}
