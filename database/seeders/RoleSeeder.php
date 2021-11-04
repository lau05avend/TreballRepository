<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.role.cache');

        $roles = [
            'Admin',
            'Cliente',
            'Gerente',
            'Coordinador',
            'Instalador',
            'Ingeniero',
        ];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role
            ]);
        }



    }
}
