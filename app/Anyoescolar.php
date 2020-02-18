<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Anyoescolar extends Model
{
    protected $fillable = ['fechainicio', 'fechafinal', 'centro'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'anyosescolares';

    /**
     * Get the centro that owns the año escolar.
     */
    public function centroObject()
    {
        return $this->belongsTo('App\Centro', 'centro');
    }

    /**
     * Get the grupos for the años escolares.
     */
    public function grupos()
    {
        return $this->hasMany('App\Grupo', 'anyoescolar');
    }

    //crear getañoescolar del usuario autentificado
    public static function anyoescolarActual()
    {
        $anyos = collect();
        $centros = Anyoescolar::centroDocenciaActual();
        $anyos = Anyoescolar::whereIn('centro', $centros)->whereDate('fechafinal', ">", now())->whereDate('fechainicio', "<", now())->get('id');
        return $anyos;
    }

    public static function centroDocenciaActual()
    {
        $centros=collect();
        $grupos =  Auth::user()->misGruposImpartidos()->get();
        foreach ($grupos as $grupo) {
            $centros->add($grupo->anyoescolarObject->centroObject->id);
        }
        return $centros;
    }
}
