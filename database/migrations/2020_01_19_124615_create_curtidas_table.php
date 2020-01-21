<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurtidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curtidas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('idUsuario');
            $table->unsignedInteger('idPublicacao');
            $table->timestamps();

            $table->foreign('idUsuario')->references('id')->on('usuarios');
            $table->foreign('idPublicacao')->references('id')->on('publicacoes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curtidas');
    }
}
