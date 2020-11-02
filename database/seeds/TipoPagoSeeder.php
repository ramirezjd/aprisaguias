<?php

use Illuminate\Database\Seeder;
use App\tipo_pago;

class TipoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo_Pago::create([
            'nombre' => 'Efectivo',
            'descripcion' => 'Moneda',
        ]);
        Tipo_Pago::create([
            'nombre' => 'Transferencia',
            'descripcion' => 'Transferencia Bancaria',
        ]);
    }
}
