<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearAccesorioCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accesorio_compra', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nombre",120);
            $table->string("tipo",120);
            $table->string("descripcion",512);
            $table->string("url_imagen",2048);
            $table->string("url_thumbnail",2048);
            $table->decimal('precio', 9, 2);

            $table->foreign('tipo')->references('nombre')->on('tipo_accesorio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accesorio_compra');
    }
}