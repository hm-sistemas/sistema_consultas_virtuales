<?php

namespace App\Http\Resources\Patient;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PatientCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'items' => $this->collection,
            'meta' => [
                'success' => true,
                'message' => 'Pacientes han sido cargados.',
            ],
        ];
    }
}