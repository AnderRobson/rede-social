<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('dataNascimento')->nullable();
            $table->unsignedTinyInteger('graduacao')->default(null);
            $table->text('imagem')->nullable();
            $table->text('capa')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('graduacao')->references('id')->on('graduacoes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
