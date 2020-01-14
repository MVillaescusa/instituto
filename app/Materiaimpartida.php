<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiaimpartida extends Model
{
    protected $table = 'materiasimpartidas';

    //TODO definir correctamente el nombre del método users o docentes
    /*
    public function users() {
        return $this->belongsTo('\App\User','id');
    }

    public function grupos() {
        return $this->belongsTo('\App\Grupo','id');
    }

    public function materias() {
        return $this->belongsTo('\App\Materia','id');
    }
    */
}
