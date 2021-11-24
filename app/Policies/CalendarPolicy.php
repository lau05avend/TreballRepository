<?php

namespace App\Policies;

use App\Models\Actividad;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CalendarPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function AccessCalendar(User $user){
        if($user->can('calendario_access')){
            return true;
        }
    }
    public function CreateCalendar(User $user){
        if($user->can('calendario_create')){
            return true;
        }
    }
    public function AllCalendar(User $user){
        if($user->can('calendario_all')){
            return true;
        }
    }
    public function ShowCalendar(User $user){
        if($user->can('calendario_show')){
            return true;
        }
    }
    public function UpdateCalendar(User $user){
        if($user->can('calendario_edit')){
            return true;
        }
    }
    public function DeleteCalendar(User $user){
        if($user->can('calendario_delete')){
            return true;
        }
    }
    public function ActiveCalendar(User $user){
        if($user->can('calendario_active')){
            return true;
        }
    }
    public function CalendarUsuario(User $user){
        if($user->can('calendario_usuario_save')){
            return true;
        }
    }
}
