<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'venue' => 'required|string|max:255',
            'date' => 'required|date|after:now',
            'price' => 'required|numeric|min:0',
            'max_attendees' => 'required|integer|min:1'
        ];
    }
}