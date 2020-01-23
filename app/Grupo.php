<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{

    protected $fillable = ['curso','letra','nombre','tutor','anyoescolar','nivel','verificado','creador'];

    /**
     * Get the post that owns the comment.
     */
    public function anyoescolarObject(){
        return $this->belongsTo('App\Anyoescolar', 'anyoescolar');
    }

    public function creadorObject(){
        return $this->belongsTo('App\User','creador');
    }

    public function tutorObject(){
        return $this->belongsTo('App\User','tutor');
    }

    public function matriculas(){
        return $this->hasMany('App\Matricula', 'grupo');
    }



    public function materiasmatriculadas()
    {
        return $this->hasMany('App\Materiamatriculada', 'grupo');
    }

    public function materiasimpartidas()
    {
        return $this->hasMany('App\Materiaimpartida', 'grupo');
    }

    public function nivelObject()
    {
        return $this->belongsTo('App\Nivel', 'nivel');
    }
}
