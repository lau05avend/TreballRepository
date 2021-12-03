<?php

namespace App\Policies;

use App\Models\Planilla;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlanillaPolicy
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

    public function AccessPl(User $user){
        if ($user->can('planilla_access')) {
            return true;
        }
    }

    public function CreatePl(User $user){
        if ($user->can('planilla_create')) {
            return true;
        }
    }
    public function AllPl(User $user){
        if ($user->can('planilla_all')) {
            return true;
        }
    }
    public function ShowPl(User $user){
        if ($user->can('planilla_show')) {
            return true;
        }
    }
    public function DeletePl(User $user){
        if ($user->can('planilla_delete')) {
            return true;
        }
    }
    public function ActivePl(User $user){
        if ($user->can('planilla_active')) {
            return true;
        }
    }
    public function UpdatePl(User $user){
        if ($user->can('planilla_edit')) {
            return true;
        }
    }

}
