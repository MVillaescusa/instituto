<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GrupoResource extends JsonResource
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
            'curso' => $this->curso,
            'letra' => $this->letra,
            'nombre' => $this->nombre,
            'tutor' => $this->tutorObject,
            'anyoescolar' => $this->anyoescolarObject,
            'nivel' => $this->nivelObject,
            'verificado' => $this->verificado,
            'creador' => $this->creadorObject,
        ];
    }
}
