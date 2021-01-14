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
            'title' => $this->title.', '.$this->doctor->title().' '.$this->doctor->last_name.', '.$this->patient->full_name,
            'title2' => $this->title,
            'description' => $this->description,
            'comments' => $this->comments,
            'status' => $this->status(),
            'status2' => $this->status,
            'service' => $this->service(),
            'service2' => $this->service,
            'date' => $this->date,
            'date2' => $this->date->format('Y-m-d'),
            'start' => $this->start,
            'start2' => $this->start->format('h:i:s'),
            'end' => $this->end,
            'end2' => $this->end->format('h:i:s'),
            'patient' => $this->patient,
            'doctor' => $this->doctor,
            'user' => $this->user,
            'first_time' => $this->first_time,
            'oximeter' => $this->oximeter,
            'thermometer' => $this->thermometer,
            'baumanometer' => $this->baumanometer,
            'glucometer' => $this->glucometer,
        ];
    }
}