<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'venue' => $this->venue,
            'date' => $this->date->format('Y-m-d H:i'),
            'price' => $this->price,
            'max_attendees' => $this->max_attendees,
            'attendee_count' => $this->attendees_count,
            'organization' => $this->organization->name,
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}