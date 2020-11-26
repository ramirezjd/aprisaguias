<?php

use Illuminate\Database\Seeder;
use App\estado;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    Estado::create( [
        'id'=>1,
        'estado'=>'DISTRITO CAPITAL'
        ] );

        Estado::create( [
        'id'=>2,
        'estado'=>'MIRANDA'
        ] );

        Estado::create( [
        'id'=>3,
        'estado'=>'BARINAS'
        ] );

        Estado::create( [
        'id'=>4,
        'estado'=>'TRUJILLO'
        ] );

        Estado::create( [
        'id'=>5,
        'estado'=>'MÉRIDA'
        ] );

        Estado::create( [
        'id'=>6,
        'estado'=>'TÁCHIRA'
        ] );

        Estado::create( [
        'id'=>7,
        'estado'=>'CARABOBO'
        ] );

        Estado::create( [
        'id'=>8,
        'estado'=>'COJEDES'
        ] );

        Estado::create( [
        'id'=>9,
        'estado'=>'LARA'
        ] );

        Estado::create( [
        'id'=>10,
        'estado'=>'PORTUGUESA'
        ] );

        Estado::create( [
        'id'=>11,
        'estado'=>'YARACUY'
        ] );

        Estado::create( [
        'id'=>12,
        'estado'=>'AMAZONAS'
        ] );

        Estado::create( [
        'id'=>13,
        'estado'=>'APURE'
        ] );

        Estado::create( [
        'id'=>14,
        'estado'=>'ARAGUA'
        ] );

        Estado::create( [
        'id'=>15,
        'estado'=>'GUÁRICO'
        ] );

        Estado::create( [
        'id'=>16,
        'estado'=>'FALCÓN'
        ] );

        Estado::create( [
        'id'=>17,
        'estado'=>'ZULIA'
        ] );

        Estado::create( [
        'id'=>18,
        'estado'=>'ANZOÁTEGUI'
        ] );

        Estado::create( [
        'id'=>19,
        'estado'=>'BOLÍVAR'
        ] );

        Estado::create( [
        'id'=>20,
        'estado'=>'DELTA AMACURO'
        ] );

        Estado::create( [
        'id'=>21,
        'estado'=>'MONAGAS'
        ] );

        Estado::create( [
        'id'=>22,
        'estado'=>'NUEVA ESPARTA'
        ] );

        Estado::create( [
        'id'=>23,
        'estado'=>'SUCRE'
        ] );

        Estado::create( [
        'id'=>24,
        'estado'=>'VARGAS'
        ] );
    }
}
