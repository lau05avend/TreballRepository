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

    public function AccessObra(User $user){
        if($user->can('obra_access')){
            return true;
        }
    }
    public function CreateObra(User $user){
        if($user->can('obra_create')){
            return true;
        }
    }
    public function AllObra(User $user){
        if($user->can('obra_all')){
            return true;
        }
    }
    public function ShowObra(User $user){
        if($user->can('obra_show')){
            return true;
        }
    }
    public function UpdateObra(User $user){
        if($user->can('obra_edit')){
            return true;
        }
    }
    public function UpdateCondicObra(User $user){
        if($user->can('obra_editcond')){
            return true;
        }
    }
    public function DeleteObra(User $user){
        if($user->can('obra_delete')){
            return true;
        }
    }
    public function ActiveObra(User $user){
        if($user->can('obra_active')){
            return true;
        }
    }
    public function ObraUsuario(User $user){
        if($user->can('obra_usuario_save')){
            return true;
        }
    }

    public function ObraTerminadaCancelada(User $user){
        if($user->getRoleNames()[0] == 'Gerente' || $user->getRoleNames()[0] == 'Coordinador'){
            return true;
        }
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
