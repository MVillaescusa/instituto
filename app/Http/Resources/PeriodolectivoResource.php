<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PeriodolectivoResource extends JsonResource
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
            'dia' => $this->dia,
            'hora_inicio' => $this->hora_inicio,
            'hora_fin' => $this->hora_fin,
            'anyoescolar_id' => $this->anyoescolarObject,
        ];
    }
}
