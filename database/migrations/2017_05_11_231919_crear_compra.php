<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('usuario_id');
            $table->unsignedInteger('vendedor_id');
            $table->unsignedInteger('moto_compra_id');
            $table->dateTime('fecha_compra');

            $table->foreign('usuario_id')->references('id')->on('usuario');
            $table->foreign('vendedor_id')->references('id')->on('vendedor');
            $table->foreign('moto_compra_id')->references('id')->on('moto_compra');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compra');
    }
}