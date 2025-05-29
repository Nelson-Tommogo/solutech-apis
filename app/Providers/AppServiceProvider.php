<?php

namespace App\Providers;

use App\Models\Attendee;
use App\Models\Event;
use App\Policies\AttendeePolicy;
use App\Policies\EventPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Event::class => EventPolicy::class,
        Attendee::class => AttendeePolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}