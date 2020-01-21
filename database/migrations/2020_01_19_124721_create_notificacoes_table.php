<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificacoes', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('idUsuarioDe');
            $table->unsignedInteger('idUsuarioPara');
            $table->unsignedInteger('idPublicacao');
            $table->timestamps();

            $table->foreign('idUsuarioDe')->references('id')->on('usuarios');
            $table->foreign('idUsuarioPara')->references('id')->on('usuarios');
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
        Schema::dropIfExists('notificacoes');
    }
}
