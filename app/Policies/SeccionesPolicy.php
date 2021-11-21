<?php

namespace App\Policies;

use App\Models\seccion;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class SeccionesPolicy
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

    public function createSeccion(User $user){
        if ($user->can('seccion_create')) {
            return true;
        }
    }
    public function editSeccion(User $user){
        if ($user->can('seccion_edit')) {
            return true;
        }
    }
    public function showSeccion(User $user){
        if ($user->can('seccion_show')) {
            return true;
        }
    }
    public function deleteSeccion(User $user){
        if ($user->can('seccion_delete')) {
            return true;
        }
    }
    public function activeSeccion(User $user){
        if ($user->can('seccion_active')) {
            return true;
        }
    }
    public function accessSeccion(User $user){
        if ($user->can('seccion_access')) {
            return true;
        }
    }

}
