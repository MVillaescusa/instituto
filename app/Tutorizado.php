<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutorizado extends Model
{

    protected $fillable = ['tutorado','tutor', 'verificadoToken'];

    public function tutorObject() {
        return $this->belongsTo('App\User', 'tutor');
    }

    public function tutoradoObject() {
        return $this->belongsTo('App\User', 'tutorado');
    }
}
