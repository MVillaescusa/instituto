<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodolectivo extends Model
{
    public function periodosclases()
    {
        return $this->hasMany('App\Periodosclase', 'periodo_id');
    }

    public function anyoescolarObject()
    {
        return $this->belongsTo('App\Anyoescolar', 'anyoescolar_id');
    }
}
