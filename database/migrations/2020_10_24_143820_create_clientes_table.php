<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_documento', 2);
            $table->string('documento', 20);
            $table->string('nombre_razonsocial', 256);
            $table->string('email', 156);
            $table->string('telefono', 156);
            $table->softDeletes();

            $table->unsignedBigInteger('direccion_id');

            $table->timestamps();

            $table->foreign('direccion_id')->references('id')->on('direcciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
