<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsToRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.role_has_permissions.cache');

        $roles = Role::get();
        $permissions = Permission::get();

        $permissions[0]->syncRoles([$roles[0]]);   //user management
        $permissions[1]->syncRoles([$roles]);      //view_dashboard
        $permissions[12]->syncRoles([$roles[2]]);  //empleado_create
        $permissions[13]->syncRoles([$roles[0]]);  //empleado_edit
        $permissions[14]->syncRoles([$roles[0]]);  //empleado_show
        $permissions[15]->syncRoles([$roles[0]]);
        $permissions[16]->syncRoles([$roles[0]]);
        $permissions[17]->syncRoles([$roles[0]]);

        //por rol
        $roles[0]->syncPermissions($permissions);  //admin
        $roles[1]->syncPermissions($permissions[30], $permissions[27], $permissions[34],$permissions[41], $permissions[39]);  //cliente

    }
}
