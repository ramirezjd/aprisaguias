<?php

use Illuminate\Database\Seeder;
use App\tipo_destino;

class TipoDestinosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo_Destino::create([
            'nombre' => 'Aliado Comercial',
            'descripcion' => 'Afiliado Aprisa',
        ]);
        Tipo_Destino::create([
            'nombre' => 'Oficina',
            'descripcion' => 'Oficina Aprisa',
        ]);
        Tipo_Destino::create([
            'nombre' => 'Domicilio',
            'descripcion' => 'Entrega en Puerta',
        ]);
    }
}
