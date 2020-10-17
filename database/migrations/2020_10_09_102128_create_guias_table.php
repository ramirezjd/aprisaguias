<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guias', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 120);
            $table->string('peso', 256);
            $table->string('dimensiones', 256);
            $table->float('precio', 8, 2);
            $table->float('asegurado', 8, 2);
            $table->timestamp('fecha_creacion',0);
            $table->timestamp('fecha_entrega',0)->nullable();
            $table->string('direccion_destino', 256)->nullable();
            $table->string('punto_referencia_destino', 256)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guias');
    }
}
