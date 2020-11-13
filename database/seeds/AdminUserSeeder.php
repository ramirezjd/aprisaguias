<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'cargo_id' => 1,
            'email' => 'admin@aprisa.com',
            'cargo_id' => 1,
            'password' => bcrypt('thisisagoodpsw'),
        ]);

        $user->assignRole('super-admin');

        $user = User::create([
            'username' => 'regular-user',
            'nombres' => 'What',
            'apellidos' => 'Ever',
            'cargo_id' => 1,
            'email' => 'regular@user.com',
            'cargo_id' => 1,
            'password' => bcrypt('nothardatall'),
        ]);
    }
}
