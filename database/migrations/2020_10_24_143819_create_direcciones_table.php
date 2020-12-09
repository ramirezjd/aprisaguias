<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id();
            $table->string('urbanizacion', 256);

            $table->string('via_principal', 256);
            $table->string('edificio_casa', 256);
            $table->string('punto_referencia', 256);


            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('ciudad_id');
            $table->unsignedBigInteger('municipio_id');
            $table->unsignedBigInteger('parroquia_id');
            $table->unsignedBigInteger('zip_code_id');

            $table->timestamps();
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->foreign('ciudad_id')->references('id')->on('ciudades');
            $table->foreign('municipio_id')->references('id')->on('municipios');
            $table->foreign('parroquia_id')->references('id')->on('parroquias');
            $table->foreign('zip_code_id')->references('id')->on('zip_codes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direcciones');
    }
}
