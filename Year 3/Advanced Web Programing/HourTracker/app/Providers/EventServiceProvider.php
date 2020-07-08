<?php

namespace App\Providers;

use App\Events\NewCompanyRequestEvent;
use App\Events\NewCompanyUserRegisterEvent;
use App\Listeners\ConfirmRegistrationRequest;
use App\Listeners\NewCompanyRequest;
use App\Listeners\NewUserRegisteredWithCompany;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewCompanyRequestEvent::class => [
            ConfirmRegistrationRequest::class,
            NewCompanyRequest::class
        ],
        NewCompanyUserRegisterEvent::class => [
            NewUserRegisteredWithCompany::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
