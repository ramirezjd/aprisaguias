<?php

use Illuminate\Database\Seeder;
use App\transportista;

class TransportistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        transportista::create([
            'tipo_documento' => 'V-',
            'documento' => '21003727',
            'nombres' => 'Jesus David',
            'apellidos' => 'Ramirez Gonzalez',
            'direccion' => 'Direccion 01 prueba',
            'telefono' => '0424-5555555',
        ]);
        transportista::create([
            'tipo_documento' => 'E-',
            'documento' => '21045897',
            'nombres' => 'Nombre Segundo',
            'apellidos' => 'Prueba Tercero',
            'direccion' => 'Direccion 02 prueba',
            'telefono' => '0412-5555555',
        ]);
        transportista::create([
            'tipo_documento' => 'RIF',
            'documento' => '13456852',
            'nombres' => 'David Jesus',
            'apellidos' => 'Gonzalez Ramirez',
            'direccion' => 'Direccion 03 prueba',
            'telefono' => '0414-5555555',
        ]);
        transportista::create([
            'tipo_documento' => 'V-',
            'documento' => '21020377',
            'nombres' => 'Oscar Segundo',
            'apellidos' => 'Lopez Tercero',
            'direccion' => 'ASD Direccion 04 prueba',
            'telefono' => '0424-5555555',
        ]);
        transportista::create([
            'tipo_documento' => 'NIT',
            'documento' => '13852456',
            'nombres' => 'Fulanito De',
            'apellidos' => 'Tal Jaja',
            'direccion' => 'Direccion 05 prueba',
            'telefono' => '1234-5555555',
        ]);
    }
}
