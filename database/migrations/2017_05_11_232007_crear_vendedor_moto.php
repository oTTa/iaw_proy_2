<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearVendedorMoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendedor_moto', function (Blueprint $table) {
            $table->unsignedInteger('vendedor_id');
            $table->unsignedInteger('moto_id');

            $table->foreign('vendedor_id')->references('id')->on('vendedor');
             $table->foreign('moto_id')->references('id')->on('moto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendedor_moto');
    }
}
