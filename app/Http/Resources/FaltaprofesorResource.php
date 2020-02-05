<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FaltaprofesorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'profesor_falta' => $this->profesorfaltaObject,
            'profesor_guardia' => $this->profesorguardiaObject,
            'periodoclase_id' =>  $this->periodoclaseObject->id,
        ];
        return parent::toArray($request);
    }
}
