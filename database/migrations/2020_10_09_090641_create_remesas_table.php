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
            $table->string('tipo_documento_destinatario', 2);
            $table->string('documento_destinatario', 20);
            $table->string('nombres_destinatario', 256);
            $table->string('apellidos_destinatario', 256);
            $table->string('email_destinatario', 156);
            $table->string('telefono_destinatario', 156);
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
        Schema::dropIfExists('remesas');
    }
}
