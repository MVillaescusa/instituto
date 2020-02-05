<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AulaResource extends JsonResource
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
            'numero' => $this->numero,
            'nombre' => $this->nombre,
            'edificio' => $this->edificio,
            'planta' => $this->planta,
            'centro_id' => $this->centroObject, // relación con el coordinador
        ];;
    }
}
