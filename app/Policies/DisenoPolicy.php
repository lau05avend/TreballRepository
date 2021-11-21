<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DisenoPolicy
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

    public function createDs(User $user){
        if ($user->can('diseno_create')) {
            return true;
        }
    }
    public function DuseñoEdit(User $user){
        if ($user->can('diseno_edit')) {
            return true;
        }
    }
    public function accessDis(User $user){
        if ($user->can('diseno_access')) {
            return true;
        }
    }
    public function ShowDs(User $user){
        if($user->can('diseno_show')){
            return true;
        }
    }
    public function deleteDs(User $user){
        if ($user->can('diseno_delete')) {
            return true;
        }
    }
    public function AcceDiseño(User $user){
        if ($user->can('diseno_access')) {
            return true;
        }
    }
    public function AllDisño(User $user){
        if ($user->can('diseno_all')) {
            return true;
        }
    }
    public function MDS(User $user){
        if ($user->can('material_diseno_save')) {
            return true;
        }
    }
}
