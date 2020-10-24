<?php

use Illuminate\Database\Seeder;
use App\cargo;

class CargoUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cargo::create([
            'nombre' => 'Super Admin',
            'descripcion' => 'Administrador General Dev Sistema',
        ]);
    }
}
