<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $fillable = ['numero', 'nombre', 'edificio', 'planta','centro_id'];

    public function centroObject()
    {
        return $this->belongsTo('App\Centro', 'centro_id');
    }

    public function periodosClases(){
        return $this->hasMany('App\Periodosclase', 'aula_id');
    }
}
