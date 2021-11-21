<?php

namespace App\Policies;

use App\Models\Cliente;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function createClie(User $user){
        if ($user->can('cliente_create')) {
            return true;
        }
    }
    public function editClie(User $user){
        if ($user->can('cliente_edit')) {
            return true;
        }
    }
    public function showClie(User $user){
        if ($user->can('cliente_show')) {
            return true;
        }
    }
    public function deleteClie(User $user){
        if ($user->can('cliente_delete')) {
            return true;
        }
    }
    public function activeClie(User $user){
        if ($user->can('cliente_active')) {
            return true;
        }
    }
    public function accessClie(User $user){
        if ($user->can('cliente_access')) {
            return true;
        }
    }

}
