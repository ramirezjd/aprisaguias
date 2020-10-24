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
        User::create([
            'username' => 'Aprisadmin',
            'nombres' => 'Admin',
            'apellidos' => 'Aprisa',
            'email' => 'admin@aprisa.com',
            'cargo_id' => 1,
            'password' => bcrypt('thisisagoodpsw'),
        ]);
    }
}
