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

    public function CreateDiseño(User $user){
        if ($user->can('diseno_create')) {
            return true;
        }
    }
    public function DiseñoEdit(User $user){
        if ($user->can('diseno_edit')) {
            return true;
        }
    }
    public function AccessDiseno(User $user){
        if ($user->can('diseno_access')) {
            return true;
        }
    }
    public function ShowDiseño(User $user){
        if($user->can('diseno_show')){
            return true;
        }
    }
    public function deleteDiseño(User $user){
        if ($user->can('diseno_delete')) {
            return true;
        }
    }
    public function AllDiseno(User $user){
        if ($user->can('diseno_all')) {
            return true;
        }
    }
    public function MaterialDiseñoSave(User $user){
        if ($user->can('material_diseno_save')) {
            return true;
        }
    }
}
