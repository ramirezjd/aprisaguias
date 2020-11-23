<?php

use Illuminate\Database\Seeder;
use App\vehiculo;

class VehiculosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        vehiculo::create([
            'codigo' => '33-12-55',
            'placa' => '123XD45',
        ]);

        vehiculo::create([
            'codigo' => '44-15-52',
            'placa' => '420XD69',
        ]);

        vehiculo::create([
            'codigo' => '99-66-52',
            'placa' => '2265XD7',
        ]);

        vehiculo::create([
            'codigo' => '55-11-42',
            'placa' => '33589XD',
        ]);
    }
}
