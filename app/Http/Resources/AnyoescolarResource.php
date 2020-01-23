<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnyoescolarResource extends JsonResource
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
            'fechaInicio' => $this->fechainicio,
            'fechaFinal' => $this->fechafinal,
            'centro' => $this->centroObject,
        ];
    }
}
