<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('idUsuario');
            $table->unsignedInteger('idPublicacao');
            $table->text('comentario');
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
        Schema::dropIfExists('comentarios');
    }
}
