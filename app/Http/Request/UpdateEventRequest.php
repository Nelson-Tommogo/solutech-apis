<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'venue' => 'sometimes|string|max:255',
            'date' => 'sometimes|date|after:now',
            'price' => 'sometimes|numeric|min:0',
            'max_attendees' => 'sometimes|integer|min:1'
        ];
    }
}