<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodolectivo extends Model
{
<<<<<<< HEAD
    protected $table = 'periodoslectivos'
=======
    protected $table = "periodoslectivos";
>>>>>>> horarios arreglado definitivo + cambios de jorge
    protected $fillable = ['dia', 'hora_inicio', 'hora_fin', 'anyoescolar_id'];
    public function periodosclases()
    {
        return $this->hasMany('App\Periodosclase', 'periodo_id');
    }

    public function anyoescolarObject()
    {
        return $this->belongsTo('App\Anyoescolar', 'anyoescolar_id');
    }
}
