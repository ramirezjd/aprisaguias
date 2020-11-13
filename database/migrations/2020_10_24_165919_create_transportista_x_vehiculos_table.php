<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportistaXVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportista_x_vehiculos', function (Blueprint $table) {

            $table->unsignedBigInteger('vehiculo_id');
            $table->unsignedBigInteger('transportista_id');

            $table->timestamps();

            $table->foreign('vehiculo_id')->references('id')->on('vehiculos');
            $table->foreign('transportista_id')->references('id')->on('transportistas');

            //SETTING THE PRIMARY KEYS
            $table->primary(['vehiculo_id','transportista_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transportista_x_vehiculos');
    }
}

