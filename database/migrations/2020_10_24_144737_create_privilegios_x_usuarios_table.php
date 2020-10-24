<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivilegiosXUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privilegios_x_usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('privilegio_id');
            $table->unsignedBigInteger('user_id');

            $table->timestamps();

            $table->foreign('privilegio_id')->references('id')->on('privilegios');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('privilegios_x_usuarios');
    }
}
