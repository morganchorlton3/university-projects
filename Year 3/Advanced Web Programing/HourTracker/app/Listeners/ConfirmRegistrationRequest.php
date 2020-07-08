<?php

namespace App\Listeners;

use App\Mail\CompanyRegisterConfirmation;
use App\Notifications\ConfirmCompany;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use App\User;

class ConfirmRegistrationRequest implements ShouldQueue
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
        Mail::to($event->user->email)->send(new CompanyRegisterConfirmation($event->user));
    }
}
