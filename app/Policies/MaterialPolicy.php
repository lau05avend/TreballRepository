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

    public function createMaterial(User $user){
        if ($user->can('material_create')) {
            return true;
        }
    }
    public function accessMaterial(User $user){
        if ($user->can('material_access')) {
            return true;
        }
    }
    public function deleteMaterial(User $user){
        if ($user->can('material_delete')) {
            return true;
        }
    }
    public function updateMaterial(User $user){
        if ($user->can('material_edit')) {
            return true;
        }
    }
    public function ShowMaterial(User $user){
        if ($user->can('material_show')) {
            return true;
        }
    }
    public function MaterialActive(User $user){
        if ($user->can('material_active')) {
            return true;
        }
    }


}
