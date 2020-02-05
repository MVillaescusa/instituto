<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodoclase extends Model
{
    protected $table = "periodosclases";
    protected $fillable = ['periodo_id','materiaimpartida_id', 'aula_id'];

    public function periodoObject() {
        return $this->belongsTo('App\Periodolectivo', 'periodo_id');
    }

    public function materiaimpartidaObject() {
        return $this->belongsTo('App\Materiaimpartida', 'materiaimpartida_id');
    }

    public function aulaObject() {
        return $this->belongsTo('App\Aula', 'aula_id');
    }
}
