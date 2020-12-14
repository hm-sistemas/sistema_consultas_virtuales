<?php

namespace App\Http\Resources\Appointment;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'comments' => $this->comments,
            'status' => $this->status(),
            'status2' => $this->status,
            'date' => $this->date->format('M-d-Y'),
            'date2' => $this->date->format('Y-m-d'),
            'start' => $this->start->toTimeString(),
            'start2' => $this->start->format('h:i:s'),
            'end' => $this->end->toTimeString(),
            'end2' => $this->end->format('h:i:s'),
        ];
    }
}