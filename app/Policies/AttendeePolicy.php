<?php

namespace App\Policies;

use App\Models\Attendee;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttendeePolicy
{
    use HandlesAuthorization;

    public function view(User $user, Attendee $attendee)
    {
        return $user->organization_id === $attendee->event->organization_id;
    }

    public function create(User $user)
    {
        return true;
    }
}