<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model {
protected $fillable = ['nombre'];
    public function materiasImpartidas() {
        return $this->hasMany('App\Materiaimpartida', "materia");
    }
    public function materiasMatriculadas() {
        return $this->hasMany('App\Materiamatriculada', "materia");
    }
}
