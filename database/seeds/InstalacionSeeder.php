<?php

use Illuminate\Database\Seeder;
use App\instalacion;

class InstalacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Instalacion::create([
            'codigo' => '58-SAC301',
            'descripcion' => 'Instalación San Cristobal',
        ]);
        Instalacion::create([
            'codigo' => '58-BAR827',
            'descripcion' => 'Instalación Barinas',
        ]);
    }
}
