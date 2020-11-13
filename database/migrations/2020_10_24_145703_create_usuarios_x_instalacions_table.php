<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosXInstalacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_x_instalacions', function (Blueprint $table) {

            $table->unsignedBigInteger('instalacion_id');
            $table->unsignedBigInteger('user_id');

            $table->timestamps();

            $table->foreign('instalacion_id')->references('id')->on('instalaciones');
            $table->foreign('user_id')->references('id')->on('users');

            //SETTING THE PRIMARY KEYS
            $table->primary(['instalacion_id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios_x_instalacions');
    }
}
