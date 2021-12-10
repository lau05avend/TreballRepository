<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin123',
            'RolExterno' => 'empleado',
            'NumeroDocumento' => '123456'
        ]);

        $user->assignRole('Admin');
    }
}
