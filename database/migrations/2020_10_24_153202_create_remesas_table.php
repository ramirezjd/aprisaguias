<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remesas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 120);
            $table->string('descripcion', 256);
            $table->string('peso_total', 256);
            $table->string('volumen_total', 256);
            $table->timestamp('fecha_entrega',0)->nullable();

            $table->unsignedBigInteger('vehiculo_id');

            $table->timestamps();

            $table->foreign('vehiculo_id')->references('id')->on('vehiculos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remesas');
    }
}
