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
            $table->float('precio', 15, 2);
            $table->float('asegurado', 8, 2);
            $table->float('peso_total', 8, 2)->nullable();
            $table->float('peso_volumetrico', 8, 2)->nullable();
            $table->integer('n_paquetes')->nullable();
            $table->string('cod_origen', 120);
            $table->string('cod_destino', 120);
            $table->string('status', 120);
            $table->timestamp('fecha_creacion',0);
            $table->timestamp('fecha_entrega',0)->nullable();
            $table->softDeletes();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cliente_remitente_id');
            $table->unsignedBigInteger('cliente_destinatario_id');
            $table->unsignedBigInteger('instalacion_origen_id');
            $table->unsignedBigInteger('instalacion_destino_id');
            $table->unsignedBigInteger('tipo_destino_id');
            $table->unsignedBigInteger('tipo_pago_id');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cliente_remitente_id')->references('id')->on('clientes');
            $table->foreign('cliente_destinatario_id')->references('id')->on('clientes');
            $table->foreign('instalacion_origen_id')->references('id')->on('instalaciones');
            $table->foreign('instalacion_destino_id')->references('id')->on('instalaciones');
            $table->foreign('tipo_destino_id')->references('id')->on('tipo_destinos');
            $table->foreign('tipo_pago_id')->references('id')->on('tipo_pagos');
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
