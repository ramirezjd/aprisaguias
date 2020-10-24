<?php

use Illuminate\Database\Seeder;
use App\region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


Region::create( [
    'id'=>2,
    'nombre'=>'ANDINA'
    ] );



    Region::create( [
    'id'=>1,
    'nombre'=>'CAPITAL'
    ] );



    Region::create( [
    'id'=>3,
    'nombre'=>'CENTRAL'
    ] );



    Region::create( [
    'id'=>4,
    'nombre'=>'CENTRO LLANO'
    ] );



    Region::create( [
    'id'=>5,
    'nombre'=>'OCCIDENTAL'
    ] );



    Region::create( [
    'id'=>6,
    'nombre'=>'ORIENTAL'
    ] );



    Region::create( [
    'id'=>7,
    'nombre'=>'VARGAS'
    ] );




    }
}
