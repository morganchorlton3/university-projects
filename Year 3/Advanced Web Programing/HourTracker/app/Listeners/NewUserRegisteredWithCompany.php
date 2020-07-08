<?php

namespace App\Listeners;

use App\Notifications\CompanyNewUserRegisterd;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewUserRegisteredWithCompany implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $manager = User::find($event->company->ownerUID);
        $manager->notify(new CompanyNewUserRegisterd($event->company, $event->user));
    }
}
