<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    protected $fillable = ['codigo', 'nombre', 'web', 'situacion', 'coordinador'];
    /**
     * Get the anyosescolares for the centro.
     */
    public function anyosescolares()
    {
        return $this->hasMany('App\Anyoescolar', 'centro');
    }

    /**
     * Get the coordinador that owns the centro.
     */
    public function coordinadorObject()
    {
        return $this->belongsTo('App\User', 'coordinador');
    }

    public function misGrupos() {
        return $this->hasManyThrough(
            'App\Grupo',
            'App\Anyoescolar',
            'centro', // Foreign key on anyosescolares table...
            'anyoescolar', // Foreign key on grupos table...
            'id', // Local key on centros table...
            'id' // Local key on anyosescolares table...
        );
    }





}
