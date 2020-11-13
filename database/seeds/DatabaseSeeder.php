<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(CargoUserSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(EstadosSeeder::class);
        $this->call(MunicipiosSeeder::class);
        $this->call(CiudadesSeeder::class);
        $this->call(ParroquiasSeeder::class);
        $this->call(Zip_CodesSeeder::class);
        $this->call(TipoInstalacionSeeder::class);
        $this->call(InstalacionSeeder::class);
        $this->call(TipoDestinosSeeder::class);
        $this->call(TipoPagoSeeder::class);
        $this->call(TipoPaqueteSeeder::class);
    }
}
