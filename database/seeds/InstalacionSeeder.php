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
            'codigo' => '58-060340',
            'tipo_instalacion_id' => 2,
            'descripcion' => 'Sucursal Ureña 01',
            'urbanizacion' => 'Urbanizacion Ureña',
            'via_principal' => 'SI',
            'edificio_casa' => 'Edificio Alma',
            'punto_referencia' => 'Referencia Mater',
            'estado_id' => 6,
            'ciudad_id' => 324,
            'municipio_id' => 86,
            'parroquia_id' => 324,
            'zip_code_id' => 340
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

        Instalacion::create([
            'codigo' => '58-180935',
            'tipo_instalacion_id' => 1,
            'descripcion' => 'Instalacion Anaco 01',
            'urbanizacion' => 'Urbanizacion Anaco',
            'via_principal' => 'SI',
            'edificio_casa' => 'Casa San Joaquin',
            'punto_referencia' => 'Punto Capital Anaco',
            'estado_id' => 18,
            'ciudad_id' => 888,
            'municipio_id' => 262,
            'parroquia_id' => 887,
            'zip_code_id' => 935
        ]);

        Instalacion::create([
            'codigo' => '58-050236',
            'tipo_instalacion_id' => 2,
            'descripcion' => 'Instalacion Merida 01',
            'urbanizacion' => 'Urbanizacion Cualquiera',
            'via_principal' => 'NO',
            'edificio_casa' => 'Edificio Merida',
            'punto_referencia' => 'Referencia Capitan',
            'estado_id' => 5,
            'ciudad_id' => 222,
            'municipio_id' => 55,
            'parroquia_id' => 223,
            'zip_code_id' => 236
        ]);

        Instalacion::create([
            'codigo' => '58-010005',
            'tipo_instalacion_id' => 1,
            'descripcion' => 'Instalacion Caracas 01',
            'urbanizacion' => 'Urbanizacion La Pastoroa',
            'via_principal' => 'SI',
            'edificio_casa' => 'Edificio Caracas',
            'punto_referencia' => 'Referencia America',
            'estado_id' => 1,
            'ciudad_id' => 1,
            'municipio_id' => 1,
            'parroquia_id' => 5,
            'zip_code_id' => 5
        ]);

        Instalacion::create([
            'codigo' => '58-150709',
            'tipo_instalacion_id' => 2,
            'descripcion' => 'Instalacion Guarico 01',
            'urbanizacion' => 'Urbanizacion El',
            'via_principal' => 'NO',
            'edificio_casa' => 'Edificio Socorro',
            'punto_referencia' => 'Referencia XD',
            'estado_id' => 15,
            'ciudad_id' => 664,
            'municipio_id' => 203,
            'parroquia_id' => 664,
            'zip_code_id' => 709
        ]);

    }
}
