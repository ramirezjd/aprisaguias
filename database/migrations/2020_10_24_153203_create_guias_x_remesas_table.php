<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuiasXRemesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guias_x_remesas', function (Blueprint $table) {

            $table->unsignedBigInteger('guia_id');
            $table->unsignedBigInteger('remesa_id');

            $table->timestamps();

            $table->foreign('guia_id')->references('id')->on('guias');
            $table->foreign('remesa_id')->references('id')->on('remesas');

            //SETTING THE PRIMARY KEYS
            $table->primary(['guia_id','remesa_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guias_x_remesas');
    }
}
