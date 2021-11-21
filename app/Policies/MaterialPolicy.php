<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MaterialPolicy
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

    public function createMa(User $user){
        if ($user->can('material_create')) {
            return true;
        }
    }
    public function accessMa(User $user){
        if ($user->can('material_access')) {
            return true;
        }
    }
    public function deleteMa(User $user){
        if ($user->can('material_delete')) {
            return true;
        }
    }
    public function updateMa(User $user){
        if ($user->can('material_edit')) {
            return true;
        }
    }
    public function ShowMaterial(User $user){
        if ($user->can('material_show')) {
            return true;
        }
    }
    public function MaterialActiv(User $user){
        if ($user->can('material_active')) {
            return true;
        }
    }


}
