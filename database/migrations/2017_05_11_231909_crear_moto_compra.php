<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearMotoCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moto_compra', function (Blueprint $table) {
            $table->increments('id');
            $table->string("tipo",120);
            $table->string("marca",120);
            $table->unsignedSmallInteger('cilindraje');
            $table->string("modelo",120);
            $table->unsignedTinyInteger('rating');
            $table->unsignedInteger('precio');
            $table->string("url_video",2048);
            $table->unsignedInteger('color_id');

            $table->foreign('tipo')->references('nombre')->on('tipo');
            $table->foreign('marca')->references('nombre')->on('marca');
            $table->foreign('cilindraje')->references('cantidad')->on('cilindraje');
            $table->foreign('color_id')->references('id')->on('color');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moto_compra');
    }
}