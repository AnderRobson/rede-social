<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensagens', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('idUsuarioDe');
            $table->unsignedInteger('idUsuarioPara');
            $table->text('mensagem');
            $table->text('imagem')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();

            $table->foreign('idUsuarioDe')->references('id')->on('usuarios');
            $table->foreign('idUsuarioPara')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensagens');
    }
}
