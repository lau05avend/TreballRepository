<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NovedadPolicy
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

    public function createNovedad(User $user){
        if ($user->can('novedad_create')) {
            return true;
        }
    }
    public function accessNovedad(User $user){
        if ($user->can('novedad_access')) {
            return true;
        }
    }
    public function allNovedad(User $user){
        if ($user->can('novedad_all')) {
            return true;
        }
    }
    public function deleteNovedad(User $user){
        if ($user->can('novedad_delete')) {
            return true;
        }
    }
    public function updateAllNovedad(User $user){
        if ($user->can('novedad_edit')) {
            return true;
        }
    }

    public function updateTimeNovedad(User $user){
        if ($user->can('novedad_editTime')) {
            return true;
        }
    }

    public function ShowNovedad(User $user){
        if ($user->can('novedad_show')) {
            return true;
        }
    }
    public function NovedadActiv(User $user){
        if ($user->can('novedad_active')) {
            return true;
        }
    }

}
