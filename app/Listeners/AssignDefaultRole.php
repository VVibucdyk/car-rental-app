<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Models\Role;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AssignDefaultRole
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event)
    {
        // Fetch the default role (Assuming 'user' is the default role name)
        $defaultRole = Role::where('name', 'user')->first();

        // Assign the role to the user
        $event->user->roles()->attach($defaultRole->id);
    }
}
