<?php

namespace App\Policies;

use App\Models\Obra;
use App\Models\Usuario;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ObraPolicy
{
    use HandlesAuthorization;

    public function __construct(){

    }

    public function AginadoUser(User $user, Obra $obra){
        // foreach ($obra->Usuarios()->get() as $us) {
        //     if($user->empleado()->select('id')->get() == $us){
        //         return true;
        //     }
        //     else{
        //         return false;
        //     }
        // }
        $us = Usuario::find(10);
        if($user->id == $us->user_id){
            return true;
        }
        else{
            return false;
        }
    }

    public function ClienteInactiveStorage(User $user, Obra $obra){
        if($obra->cliente()->select('isActive')->get() == 'Inactive'){
            return false;
        }
        else{
            return true;
        }
    }

}
