<?php

use Illuminate\Database\Seeder;
use App\tipo_instalacion;

class TipoInstalacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tipo_instalacion::create([
            'nombre' => 'OFICINA APRISA',
            'descripcion' => 'Oficina propiedad de la empresa',
        ]);
        tipo_instalacion::create([
            'nombre' => 'ALIADO COMERCIAL',
            'descripcion' => 'Oficina propiedad de un tercero',
        ]);
        tipo_instalacion::create([
            'nombre' => 'PLATAFORMA',
            'descripcion' => 'Oficina de logistica de la empresa',
        ]);
    }
}
