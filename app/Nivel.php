<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = 'niveles';

    public function niveles() {
        return $this->hasMany('\App\Nivel','nivelsuperior');
    }

    public function nivelPadre() {
        return $this->belongsTo('\App\Nivel','nivelsuperior');
    }


}
