<?php

namespace App\Listeners;

use App\Models\Cliente;
use App\Models\Usuario;
use App\Notifications\NovedadNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class NovedadListener
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

        $event->novedad->Actividad()->get()->first()->
            Obra()->get()->first()->Usuarios()->where('empleados.rol_id','2')->get()
        ->each(function(Usuario $usuario) use ($event){
            Notification::send($usuario->User()->get()->first(), new NovedadNotification($event->novedad));
            // $usuario->User()->get()->first()->notify(new ObraNotification($obraNew));
        });

        $event->novedad->Actividad()->get()->first()->Obra->get()->first()->Cliente()->get()
        ->each(function(Cliente $cliente) use ($event){
            Notification::send($cliente->User()->get()->first(), new NovedadNotification($event->novedad));
        });



    }


}
