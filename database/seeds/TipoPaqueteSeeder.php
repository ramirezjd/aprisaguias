<?php

use Illuminate\Database\Seeder;
use App\tipo_paquete;

class TipoPaqueteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo_Paquete::create([
            'nombre' => 'Empaque',
            'descripcion' => 'Paquete Grande contenido modo caja',
        ]);
        Tipo_Paquete::create([
            'nombre' => 'Sobre',
            'descripcion' => 'Paquete ligero tipo sobre',
            'precio' => 1000,
        ]);
    }
}
