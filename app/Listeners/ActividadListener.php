<?php

namespace App\Listeners;

use App\Models\Cliente;
use App\Models\Usuario;
use App\Notifications\ActividadNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class ActividadListener
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


    public function handle($event){
        $event->actividad->Usuarios()->get()
        ->each(function(Usuario $usuario) use ($event){
            Notification::send($usuario->User()->get()->first(), new ActividadNotification($event->actividad));
        });
    }


}
