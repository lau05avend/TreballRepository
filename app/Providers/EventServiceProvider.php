<?php

namespace App\Providers;

use App\Events\ActividadEvent;
use App\Events\NovedadEvent;
use App\Events\ObraEvent;
use App\Listeners\NovedadListener;
use App\Listeners\ObraListener;
use App\Listeners\ActividadListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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
        ObraEvent::class => [
            ObraListener::class,
        ],
        NovedadEvent::class => [
            NovedadListener::class
        ],
        ActividadEvent::class => [
            ActividadListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
