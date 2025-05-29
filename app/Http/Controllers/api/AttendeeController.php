<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttendeeRequest;
use App\Models\Attendee;
use App\Models\Event;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    public function index(Request $request, Event $event)
    {
        return response()->json(
            $event->attendees()->get()
        );
    }

    public function store(StoreAttendeeRequest $request, Event $event)
    {
        $attendee = $event->attendees()->create($request->validated());
        return response()->json($attendee, 201);
    }
}