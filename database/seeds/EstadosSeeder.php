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
    'region_id'=>1,
    'estado'=>'DISTRITO CAPITAL'
    ] );



    Estado::create( [
    'id'=>2,
    'region_id'=>1,
    'estado'=>'MIRANDA'
    ] );



    Estado::create( [
    'id'=>3,
    'region_id'=>2,
    'estado'=>'BARINAS'
    ] );



    Estado::create( [
    'id'=>4,
    'region_id'=>2,
    'estado'=>'TRUJILLO'
    ] );



    Estado::create( [
    'id'=>5,
    'region_id'=>2,
    'estado'=>'MÉRIDA'
    ] );



    Estado::create( [
    'id'=>6,
    'region_id'=>2,
    'estado'=>'TÁCHIRA'
    ] );



    Estado::create( [
    'id'=>7,
    'region_id'=>3,
    'estado'=>'CARABOBO'
    ] );



    Estado::create( [
    'id'=>8,
    'region_id'=>3,
    'estado'=>'COJEDES'
    ] );



    Estado::create( [
    'id'=>9,
    'region_id'=>3,
    'estado'=>'LARA'
    ] );



    Estado::create( [
    'id'=>10,
    'region_id'=>3,
    'estado'=>'PORTUGUESA'
    ] );



    Estado::create( [
    'id'=>11,
    'region_id'=>3,
    'estado'=>'YARACUY'
    ] );



    Estado::create( [
    'id'=>12,
    'region_id'=>4,
    'estado'=>'AMAZONAS'
    ] );



    Estado::create( [
    'id'=>13,
    'region_id'=>4,
    'estado'=>'APURE'
    ] );



    Estado::create( [
    'id'=>14,
    'region_id'=>4,
    'estado'=>'ARAGUA'
    ] );



    Estado::create( [
    'id'=>15,
    'region_id'=>4,
    'estado'=>'GUÁRICO'
    ] );



    Estado::create( [
    'id'=>16,
    'region_id'=>5,
    'estado'=>'FALCÓN'
    ] );



    Estado::create( [
    'id'=>17,
    'region_id'=>5,
    'estado'=>'ZULIA'
    ] );



    Estado::create( [
    'id'=>18,
    'region_id'=>6,
    'estado'=>'ANZOÁTEGUI'
    ] );



    Estado::create( [
    'id'=>19,
    'region_id'=>6,
    'estado'=>'BOLÍVAR'
    ] );



    Estado::create( [
    'id'=>20,
    'region_id'=>6,
    'estado'=>'DELTA AMACURO'
    ] );



    Estado::create( [
    'id'=>21,
    'region_id'=>6,
    'estado'=>'MONAGAS'
    ] );



    Estado::create( [
    'id'=>22,
    'region_id'=>6,
    'estado'=>'NUEVA ESPARTA'
    ] );



    Estado::create( [
    'id'=>23,
    'region_id'=>6,
    'estado'=>'SUCRE'
    ] );



    Estado::create( [
    'id'=>24,
    'region_id'=>7,
    'estado'=>'VARGAS'
    ] );

    }
}
