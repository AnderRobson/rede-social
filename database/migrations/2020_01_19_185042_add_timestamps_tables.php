<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amizades', function (Blueprint $table) {
          $table->addColumn('timestamp', 'created_at');
          $table->addColumn('timestamp', 'updated_at');
        });

        Schema::create('comentarios', function (Blueprint $table) {
            $table->addColumn('timestamp', 'created_at');
            $table->addColumn('timestamp', 'updated_at');
        });

        Schema::create('curtidas', function (Blueprint $table) {
            $table->addColumn('timestamp', 'created_at');
            $table->addColumn('timestamp', 'updated_at');
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->addColumn('timestamp', 'created_at');
            $table->addColumn('timestamp', 'updated_at');
        });


        Schema::create('graduacoes', function (Blueprint $table) {
            $table->addColumn('timestamp', 'created_at');
            $table->addColumn('timestamp', 'updated_at');
        });


        Schema::create('mensagens', function (Blueprint $table) {
            $table->addColumn('timestamp', 'created_at');
            $table->addColumn('timestamp', 'updated_at');
        });


        Schema::create('migrations', function (Blueprint $table) {
            $table->addColumn('timestamp', 'created_at');
            $table->addColumn('timestamp', 'updated_at');
        });


        Schema::create('notificacoes', function (Blueprint $table) {
            $table->addColumn('timestamp', 'created_at');
            $table->addColumn('timestamp', 'updated_at');
        });


        Schema::create('password_resets', function (Blueprint $table) {
            $table->addColumn('timestamp', 'created_at');
            $table->addColumn('timestamp', 'updated_at');
        });


        Schema::create('publicacoes', function (Blueprint $table) {
            $table->addColumn('timestamp', 'created_at');
            $table->addColumn('timestamp', 'updated_at');
        });


        Schema::create('usuarios', function (Blueprint $table) {
            $table->addColumn('timestamp', 'created_at');
            $table->addColumn('timestamp', 'updated_at');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('amizades', function (Blueprint $table) {
            $table->removeColumn('timestamp', 'created_at');
            $table->removeColumn('timestamp', 'updated_at');
        });

        Schema::create('comentarios', function (Blueprint $table) {
            $table->removeColumn('timestamp', 'created_at');
            $table->removeColumn('timestamp', 'updated_at');
        });

        Schema::create('curtidas', function (Blueprint $table) {
            $table->removeColumn('timestamp', 'created_at');
            $table->removeColumn('timestamp', 'updated_at');
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->removeColumn('timestamp', 'created_at');
            $table->removeColumn('timestamp', 'updated_at');
        });


        Schema::create('graduacoes', function (Blueprint $table) {
            $table->removeColumn('timestamp', 'created_at');
            $table->removeColumn('timestamp', 'updated_at');
        });


        Schema::create('mensagens', function (Blueprint $table) {
            $table->removeColumn('timestamp', 'created_at');
            $table->removeColumn('timestamp', 'updated_at');
        });


        Schema::create('migrations', function (Blueprint $table) {
            $table->removeColumn('timestamp', 'created_at');
            $table->removeColumn('timestamp', 'updated_at');
        });


        Schema::create('notificacoes', function (Blueprint $table) {
            $table->removeColumn('timestamp', 'created_at');
            $table->removeColumn('timestamp', 'updated_at');
        });


        Schema::create('password_resets', function (Blueprint $table) {
            $table->removeColumn('timestamp', 'created_at');
            $table->removeColumn('timestamp', 'updated_at');
        });


        Schema::create('publicacoes', function (Blueprint $table) {
            $table->removeColumn('timestamp', 'created_at');
            $table->removeColumn('timestamp', 'updated_at');
        });


        Schema::create('usuarios', function (Blueprint $table) {
            $table->removeColumn('timestamp', 'created_at');
            $table->removeColumn('timestamp', 'updated_at');
        });
    }
}
