<?php

namespace App\Listeners;

use App\Models\Usuario;
use App\Notifications\ObraNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class ObraListener
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
        $event->obra->Usuarios()->get()
        ->each(function(Usuario $usuario) use ($event){
            Notification::send($usuario->User()->get()->first(), new ObraNotification($event->obra));
        });
    }
}
