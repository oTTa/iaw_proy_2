<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompraidAAccesoriocompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accesorio_compra', function (Blueprint $table) {
            $table->unsignedInteger('compra_id');
            $table->foreign('compra_id')->references('id')->on('compra');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accesorio_compra', function (Blueprint $table) {
            //
        });
    }
}
