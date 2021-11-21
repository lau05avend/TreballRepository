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

        Permission::where('name', 'user_management_access')->first()->syncRoles([$roles[0]]);   //user management
        Permission::where('name', 'view_dashboard')->first()->syncRoles([$roles]);      //view_dashboard

        //EMPLEADO
        Permission::where('name', 'empleado_create')->first()->syncRoles([$roles[2]]);  //empleado_create
        Permission::where('name', 'empleado_edit')->first()->syncRoles([$roles[2]]);  //empleado_edit
        Permission::where('name', 'empleado_show')->first()->syncRoles([$roles[2], $roles[3] ]);  //empleado_show
        Permission::where('name', 'empleado_delete')->first()->syncRoles([$roles[2]]);
        Permission::where('name', 'empleado_active')->first()->syncRoles([$roles[2]]);
        Permission::where('name', 'empleado_access')->first()->syncRoles([$roles[2],$roles[3]]);
        Permission::where('name', 'empleado_all')->first()->syncRoles([$roles[2]]);

        //CLIENTE
        Permission::where('name', 'cliente_create')->first()->syncRoles([$roles[2]]);
        Permission::where('name', 'cliente_edit')->first()->syncRoles([$roles[2]]);
        Permission::where('name', 'cliente_show')->first()->syncRoles([$roles[2]]);
        Permission::where('name', 'cliente_delete')->first()->syncRoles([$roles[2]]);
        Permission::where('name', 'cliente_active')->first()->syncRoles([$roles[2]]);
        Permission::where('name', 'cliente_access')->first()->syncRoles([$roles[2],$roles[3]]);

        //OBRA
        Permission::where('name', 'obra_create')->first()->syncRoles([$roles[2]]);
        Permission::where('name', 'obra_usuario_save')->first()->syncRoles([$roles[2]]);
        Permission::where('name', 'obra_edit')->first()->syncRoles([$roles[2]]);
        Permission::where('name', 'obra_editcond')->first()->syncRoles([$roles[2],$roles[3]]);
        Permission::where('name', 'obra_show')->first()->syncRoles([$roles[2],$roles[1],$roles[2],$roles[3],$roles[4],$roles[5]]);
        Permission::where('name', 'obra_delete')->first()->syncRoles([$roles[2]]);
        Permission::where('name', 'obra_active')->first()->syncRoles([$roles[2]]);
        Permission::where('name', 'obra_all')->first()->syncRoles([$roles[2]]);
        Permission::where('name', 'obra_access')->first()->syncRoles([$roles[1],$roles[2],$roles[3],$roles[4],$roles[5]]);

        // CALENDAR
        Permission::where('name', 'calendario_create')->first()->syncRoles([$roles[2],$roles[3]]);
        Permission::where('name', 'calendario_edit')->first()->syncRoles([$roles[2],$roles[3]]);
        Permission::where('name', 'calendario_usuario_save')->first()->syncRoles([$roles[2],$roles[3]]);
        Permission::where('name', 'calendario_show')->first()->syncRoles([$roles[2],$roles[3],$roles[4],$roles[5],$roles[1]]);
        Permission::where('name', 'calendario_active')->first()->syncRoles([$roles[2],$roles[3]]);
        Permission::where('name', 'calendario_delete')->first()->syncRoles([$roles[2],$roles[3]]);
        Permission::where('name', 'calendario_access')->first()->syncRoles([$roles[2],$roles[3],$roles[4],$roles[5],$roles[1]]);
        Permission::where('name', 'calendario_all')->first()->syncRoles([$roles[2]]);

        // DISEÑO
        Permission::where('name', 'diseno_create')->first()->syncRoles([$roles[5]]);
        Permission::where('name', 'diseno_edit')->first()->syncRoles([$roles[5]]);
        Permission::where('name', 'diseno_show')->first()->syncRoles([$roles[2],$roles[5],$roles[3], $roles[4],$roles[1]]);
        Permission::where('name', 'diseno_delete')->first()->syncRoles([$roles[5]]);
        Permission::where('name', 'diseno_access')->first()->syncRoles([$roles[1],$roles[2],$roles[3], $roles[4],$roles[5] ]);
        Permission::where('name', 'diseno_all')->first()->syncRoles([$roles[2]]);
        Permission::where('name', 'material_diseno_save')->first()->syncRoles([$roles[2],$roles[5] ]);

        // MATERIAL
        Permission::where('name', 'material_create')->first()->syncRoles([$roles[2]]);
        Permission::where('name', 'material_edit')->first()->syncRoles([$roles[2]]);
        Permission::where('name', 'material_show')->first()->syncRoles([ $roles[2],$roles[3],$roles[4],$roles[5] ]);
        Permission::where('name', 'material_delete')->first()->syncRoles([$roles[2]]);
        Permission::where('name', 'material_active')->first()->syncRoles([$roles[2]]);
        Permission::where('name', 'material_access')->first()->syncRoles([$roles[1],$roles[2],$roles[3],$roles[4],$roles[5]]);

        // NOVEDAD
        Permission::where('name', 'novedad_create')->first()->syncRoles([$roles[1],$roles[3],$roles[4]]);
        Permission::where('name', 'novedad_edit')->first()->syncRoles([$roles[3]]);
        Permission::where('name', 'novedad_editTime')->first()->syncRoles([$roles[1],$roles[4]]);
        Permission::where('name', 'novedad_show')->first()->syncRoles([$roles[1],$roles[2],$roles[3],$roles[4],$roles[5]]);
        Permission::where('name', 'novedad_delete')->first()->syncRoles([$roles[3]]);
        Permission::where('name', 'novedad_active')->first()->syncRoles([$roles[3]]);
        Permission::where('name', 'novedad_access')->first()->syncRoles([$roles[1],$roles[2],$roles[3],$roles[4],$roles[5]]);
        Permission::where('name', 'novedad_all')->first()->syncRoles([$roles[2]]);

        // PLANILLA
        Permission::where('name', 'planilla_create')->first()->syncRoles([$roles[2]]);
        Permission::where('name', 'planilla_edit')->first()->syncRoles([$roles[2]]);
        Permission::where('name', 'planilla_show')->first()->syncRoles([$roles[2],$roles[3],$roles[4],$roles[5]]);
        Permission::where('name', 'planilla_delete')->first()->syncRoles([$roles[2]]);
        Permission::where('name', 'planilla_active')->first()->syncRoles([$roles[2]]);
        Permission::where('name', 'planilla_access')->first()->syncRoles([$roles[2],$roles[3],$roles[4],$roles[5]]);
        Permission::where('name', 'planilla_all')->first()->syncRoles([$roles[2]]);

        // SECCIONES
        Permission::where('name', 'seccion_create')->first()->syncRoles([$roles[5]]);
        Permission::where('name', 'seccion_edit')->first()->syncRoles([$roles[5]]);
        Permission::where('name', 'seccion_show')->first()->syncRoles([$roles[1],$roles[2],$roles[3],$roles[4],$roles[5]]);
        Permission::where('name', 'seccion_delete')->first()->syncRoles([$roles[5]]);
        Permission::where('name', 'seccion_active')->first()->syncRoles([$roles[5]]);
        Permission::where('name', 'seccion_access')->first()->syncRoles([$roles[1],$roles[2],$roles[3],$roles[4],$roles[5]]);


        //por rol
        // $roles[0]->syncPermissions($permissions);  //admin
        // $roles[1]->syncPermissions($permissions[30], $permissions[27], $permissions[34],$permissions[41], $permissions[39]);  //cliente

    }
}
