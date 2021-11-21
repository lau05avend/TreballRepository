<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmpleadoPolicy
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

    public function createEm(User $user){
        if ($user->can('empleado_create')) {
            return true;
        }
    }
    public function EditEmpleado(User $user){
        if ($user->can('empleado_edit')) {
            return true;
        }
    }
    public function EmpleadoShow(User $user){
        if ($user->can('empleado_show')) {
            return true;
        }
    }
    public function deleteEm(User $user){
        if ($user->can('empleado_delete')) {
            return true;
        }
    }
    public function ActiveEmpleado(User $user){
        if ($user->can('empleado_active')) {
            return true;
        }
    }
    public function AcessEmpleado(User $user){
        if ($user->can('empleado_access')) {
            return true;
        }
    }
    public function EmpleadoAll(User $user){
        if ($user->can('empleado_all')) {
            return true;
        }
    }




}
