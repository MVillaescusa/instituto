<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anyoescolar extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'anyosescolares';

    protected $fillable = ['fechainicio','fechafinal','centro'];

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
}
