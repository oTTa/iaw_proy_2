<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearMoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moto', function (Blueprint $table) {
            $table->increments('id');
            $table->string("tipo",120);
            $table->string("marca",120);
            $table->unsignedSmallInteger('cilindraje');
            $table->string("modelo",120);
            $table->unsignedTinyInteger('rating');
            $table->unsignedInteger('precio');
            $table->string("url_video",2048);
            $table->boolean('visible')->default(TRUE);
            $table->timestamps();

            $table->foreign('tipo')->references('nombre')->on('tipo');
            $table->foreign('marca')->references('nombre')->on('marca');
            $table->foreign('cilindraje')->references('cantidad')->on('cilindraje');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moto');
    }
}