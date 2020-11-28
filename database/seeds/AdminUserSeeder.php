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
            'rol' => 1,
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
            'rol' => 5,
            'password' => bcrypt('1234'),
            'instalacion_id' => 2,
        ]);

        usuarios_x_instalacion::create([
            'instalacion_id' => 2,
            'user_id' => $user2->id,
        ]);

        $user2->givePermissionTo(['crear guia', 'ver guia', 'editar guia', 'borrar guia', 'crear remesa', 'ver remesa', 'editar remesa', 'borrar remesa']);

        $user3 = User::create([
            'username' => 'regular-user2',
            'nombres' => 'What2',
            'apellidos' => 'Ever2',
            'email' => 'regular2@user.com',
            'rol' => 5,
            'password' => bcrypt('1234'),
            'instalacion_id' => 3,
        ]);

        usuarios_x_instalacion::create([
            'instalacion_id' => 3,
            'user_id' => $user3->id,
        ]);

        $user3->givePermissionTo(['crear guia', 'ver guia', 'editar guia', 'borrar guia', 'crear remesa', 'ver remesa', 'editar remesa', 'borrar remesa']);
    }
}
