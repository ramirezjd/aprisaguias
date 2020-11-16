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
            'codigo' => 'MASTER',
            'tipo_instalacion_id' => 1,
            'descripcion' => 'MASTER',
            'urbanizacion' => 'MASTER',
            'via_principal' => 'SI',
            'edificio_casa' => 'MASTER',
            'punto_referencia' => 'MASTER',
            'estado_id' => 6,
            'ciudad_id' => 307,
            'municipio_id' => 78,
            'parroquia_id' => 309,
            'zip_code_id' => 323
        ]);

        Instalacion::create([
            'codigo' => '58-060323',
            'tipo_instalacion_id' => 1,
            'descripcion' => 'Instalación San Cristobal',
            'urbanizacion' => 'Santa Teresa CC Casa Grande',
            'via_principal' => 'SI',
            'edificio_casa' => 'Local 123',
            'punto_referencia' => 'Al lado de bebesitos',
            'estado_id' => 6,
            'ciudad_id' => 307,
            'municipio_id' => 78,
            'parroquia_id' => 309,
            'zip_code_id' => 323
        ]);

        Instalacion::create([
            'codigo' => '58-030090',
            'tipo_instalacion_id' => 1,
            'descripcion' => 'Instalación Barinas',
            'urbanizacion' => 'Urbanizacion Barinas',
            'via_principal' => 'SI',
            'edificio_casa' => 'Edificio Barinas',
            'punto_referencia' => 'En pleno Barinas',
            'estado_id' => 3,
            'ciudad_id' => 77,
            'municipio_id' => 23,
            'parroquia_id' => 77,
            'zip_code_id' => 90
        ]);
    }
}
