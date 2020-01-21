<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmizadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amizades', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('idUsuarioDe');
            $table->unsignedInteger('idUsuarioPara');
            $table->tinyInteger('aceite')->default(0);
            $table->foreign('idUsuarioDe')->references('id')->on('usuarios');
            $table->foreign('idUsuarioPara')->references('id')->on('usuarios');
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
        Schema::dropIfExists('amizades');
    }
}
