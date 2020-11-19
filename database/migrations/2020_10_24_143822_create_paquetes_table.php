<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquetes', function (Blueprint $table) {
            $table->id();
            $table->float('peso', 8, 2);
            $table->float('dim_ancho', 8, 2);
            $table->float('dim_alto', 8, 2);
            $table->float('dim_fondo', 8, 2);
            $table->float('peso_volumetrico', 10, 2);
            $table->string('descripcion', 256);
            $table->softDeletes();

            $table->unsignedBigInteger('tipo_paquete_id');
            $table->unsignedBigInteger('guia_id');

            $table->timestamps();

            $table->foreign('tipo_paquete_id')->references('id')->on('tipo_paquetes');
            $table->foreign('guia_id')->references('id')->on('guias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paquetes');
    }
}
