<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacoes', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('idUsuario');
            $table->text('publicacao');
            $table->text('imagem')->nullable();
            $table->timestamps();

            $table->foreign('idUsuario')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicacoes');
    }
}
