<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaquetesXGuiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquetes_x_guias', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('guia_id');
            $table->unsignedBigInteger('paquete_id');

            $table->timestamps();

            $table->foreign('guia_id')->references('id')->on('guias');
            $table->foreign('paquete_id')->references('id')->on('paquetes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paquetes_x_guias');
    }
}
