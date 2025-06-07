<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Event;

class EventPolicy
{
    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Event $event)
    {
        return $user->organization_id === $event->organization_id;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Event $event)
    {
        return $user->organization_id === $event->organization_id;
    }

    public function delete(User $user, Event $event)
    {
        return $user->organization_id === $event->organization_id;
    }
}