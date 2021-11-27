<?php

namespace App\Policies;

use App\Models\Actividad;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActividadPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */

    public function AccessActividad(User $user){
        if($user->can('calendario_access')){
            return true;
        }
    }
    public function CreateActividad(User $user){
        if($user->can('calendario_create')){
            return true;
        }
    }
    public function AllActividad(User $user){
        if($user->can('calendario_all')){
            return true;
        }
    }
    public function ShowActividad(User $user){
        if($user->can('calendario_show')){
            return true;
        }
    }
    public function UpdateActividad(User $user){
        if($user->can('calendario_edit')){
            return true;
        }
    }
    public function DeleteActividad(User $user){
        if($user->can('calendario_delete')){
            return true;
        }
    }
    public function ActiveActividad(User $user){
        if($user->can('calendario_active')){
            return true;
        }
    }
    public function CalendarActividad(User $user){
        if($user->can('calendario_usuario_save')){
            return true;
        }
    }

    public function RutasDesarrolladorA(User $user){
        if($user->getRoleNames()[0] == 'Admin'){
            dd('yeppppp');
            return true;
        }
    }
}
