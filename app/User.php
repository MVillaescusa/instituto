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
        return $this->hasOne('App\Centro', 'coordinador');
    }

    /**
     * Get the grupos for the user as tutor.
     */
    public function tutorGrupos()
    {
        return $this->hasMany('App\Grupo', 'tutor');
    }

    /**
     * Get the grupos for the user as creador.
     */
    public function creadorGrupos()
    {
        return $this->hasMany('App\Grupo', 'creador');
    }

    /**
     * Get the materiasimpartidas for the user as docente.
     */
    public function materiasimpartidas()
    {
        return $this->hasMany('App\Materiasimpartidas', 'docente');
    }

    /**
     * Get the materiasmatriculadas for the user as alumno.
     */
    public function materiasmatriculadas()
    {
        return $this->hasMany('App\Materiasmatriculadas', 'alumno');
    }

    /**
     * Get the matriculas for the user as alumno.
     */
    public function matriculas() {
        return $this->hasMany('App\Matricula', 'alumno');
    }

    /**
     * Get the tutorados for the user as tutorado.
     */
    public function tutorados() {
        return $this->hasMany('App\Tutorizado', 'tutorado');
    }

    public function tutores() {
        return $this->hasMany('App\Tutorizado', 'tutor');
    }

    public function isSuperAdmin() {
        return $this->email === config('app.superadmin_email');
    }
}
