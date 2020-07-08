<?php

namespace App\Listeners;

use App\Notifications\ConfirmCompany;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\User;
use Illuminate\Support\Facades\Mail;

class NewCompanyRequest implements ShouldQueue
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
        //pull all admins
        $admins = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin'); // this is the role id inside of this callback
        })->get();
        //notify each admin
        foreach($admins as $admin){
            //Mail::to($admin->email)->send(new AlertAdminNewCompanyRequest($event->company, $event->user));
            $admin->notify(new ConfirmCompany($event->company, $event->user));
        }
    }
}
