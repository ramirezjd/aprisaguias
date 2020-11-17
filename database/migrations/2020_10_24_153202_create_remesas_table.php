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
            $table->string('origen', 256);
            $table->string('destino', 256);
            $table->float('peso_volumetrico_total', 10, 2);
            $table->float('volumen_total', 10, 2);
            $table->timestamps();
            $table->timestamp('fecha_entrega',0)->nullable();
            $table->softDeletes();

            $table->unsignedBigInteger('vehiculo_id');

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
