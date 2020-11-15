<?php

use Illuminate\Database\Seeder;
use App\User;
use App\usuarios_x_instalacion;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'username' => 'Aprisadmin',
            'nombres' => 'Admin',
            'apellidos' => 'Aprisa',
            'email' => 'admin@aprisa.com',
            'password' => bcrypt('thisisagoodpsw'),
            'instalacion_id' => 1,
        ]);

        usuarios_x_instalacion::create([
            'instalacion_id' => 1,
            'user_id' => $user->id,
        ]);

        $user->assignRole('super-admin');

        $user2 = User::create([
            'username' => 'regular-user',
            'nombres' => 'What',
            'apellidos' => 'Ever',
            'email' => 'regular@user.com',
            'password' => bcrypt('nothardatall'),
            'instalacion_id' => 2,
        ]);

        $user2->assignRole('Rol de ejemplo');

        usuarios_x_instalacion::create([
            'instalacion_id' => 2,
            'user_id' => $user2->id,
        ]);
    }
}
