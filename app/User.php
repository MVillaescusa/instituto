<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Auth;

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

    public function isCoordinadorCentro(Centro $centro = null)
    {

        $booleano = true;

        if($centro == null){
            $idUser = $this->id;
            //hay que ver todos los centros
            $encontrado = Centro::where('coordinador' , $idUser)->get();
            if($encontrado == null){
                //no es coordinador
                $booleano = false;
            }
        } else {
            //hay que comprobar si es de un centro en concreto
            $idUser = $this->id;
            $idCentroCoordinador = $centro->coordinador;
            if($idUser !== $idCentroCoordinador){
                //no es coordinador de ese centro en concreto
                $booleano = false;
            }
        }
        return $booleano;
    }

    public function isProfesorCentro(Centro $centro = null)
    {
        $rtn = false;

        if($centro === null) {
            $rtn = Materiaimpartida::where('docente',$this->id)->first() ? true : false;
        } else {
            $gruposCentro = $centro->misGrupos()->get();
            $gruposImpartidos = $this->misGruposImpartidos()->get();
            $rtn = $gruposCentro->intersect($gruposImpartidos)->count() > 0 ? true : false;
        }

        return $this->isCoordinadorCentro($centro) || $rtn;
    }

    public function isAlumnoCentro(Centro $centro = null)
    {
        return true;
    }

    public function isCreadorGrupo(Grupo $grupo = null)
    {
        $booleano = true;
        $idUser = $this->id;
        if ($grupo == null) {
            $booleano = Grupo::where('tutor', $idUser)->get() ? true : false;
        } else {
            $booleano = ($idUser == $grupo->creador);
        }
        return $booleano;
    }

    public function isTutorGrupo(Grupo $grupo = null)
    {
        $booleano = true;
        $idUser = $this->id;

        if($grupo == null){
            //hay que ver todos los grupos existentes y comprobar si algun tutor coincide
            $encontrado = Tutorizado::where('tutor' , $idUser)->get();
            if($encontrado == null) $booleano = false; //no es tutor de ningun grupo
        } else {
            //hay que comprobar si es del grupo pasado como valor
            $idGrupoTutor = $grupo->tutor;
            if($idUser !== $idGrupoTutor) $booleano = false; //no es tutor del grupo especificado
        }
        return $booleano;
    }

    public function misProfesores(Nivel $nivel = null){
        //tenemos que sacar todas las matrículas que tiene un usuario
        $id = $this->id;
        $misMaterias = Materiamatriculada::where('alumno' , $id)->get();
        //ahora que tenemos las materias sacadas, los recorremos

        for($i =0; $i < count($misMaterias); $i++){
            $materias[$i] = $misMaterias[$i]->materia;
        }

        for($i =0; $i < count($materias); $i++){
            $aux = Materiaimpartida::where('materia' , $materias[$i])->first();
            $docente[$i] = $aux->userObject;
        }

        //$docente = json_encode($docente);

        return $docente;
    }

    public function misGruposImpartidos() {
        return $this->hasManyThrough(
            'App\Grupo',
            'App\Materiaimpartida',
            'docente', // Foreign key on anyosescolares table...
            'id', // Foreign key on grupos table...
            'id', // Local key on centros table...
            'grupo' // Local key on anyosescolares table...
        );
    }
}
