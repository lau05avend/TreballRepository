 <?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset cached roles and permissions
        // app()['cache']->forgetCachedRolesAndPermissions();
        app()['cache']->forget('spatie.permission.cache');

        //create permission
        $permissions = [
            'user_management_access',
            'view_dashboard',
            'permission_create',
            'permission_edit',
            'permission_show',
            'permission_delete',
            'permission_access',
            'role_create',
            'role_edit',
            'role_show',
            'role_delete',
            'role_access',
            'empleado_create',
            'empleado_edit',
            'empleado_show',
            'empleado_delete',
            'empleado_active',
            'empleado_access',
            'empleado_all',
            'cliente_create',
            'cliente_edit',
            'cliente_show',
            'cliente_delete',
            'cliente_active',
            'cliente_access',
            'obra_create',
            'obra_usuario_save',
            'obra_edit',
            'obra_editcond', //
            'obra_show',
            'obra_delete',
            'obra_active',
            'obra_all',
            'obra_access',
            'calendario_create',
            'calendario_edit',
            'calendario_usuario_save',
            'calendario_show',
            'calendario_active',
            'calendario_delete',
            'calendario_access',
            'calendario_all',
            'diseno_create',
            'diseno_edit',
            'diseno_show',
            'diseno_delete',
            'diseno_access',
            'diseno_all',
            'material_create',
            'material_edit',
            'material_show',
            'material_delete',
            'material_active',
            'material_diseno_save',
            'material_access',
            'novedad_create',
            'novedad_edit',
            'novedad_editTime',
            'novedad_show',
            'novedad_delete',
            'novedad_active',
            'novedad_access',
            'novedad_all',
            'planilla_create',
            'planilla_edit',
            'planilla_show',
            'planilla_delete',
            'planilla_active',
            'planilla_access',
            'planilla_all',
            'seccion_create',
            'seccion_edit',
            'seccion_show',
            'seccion_delete',
            'seccion_active',
            'seccion_access',
        ];
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
