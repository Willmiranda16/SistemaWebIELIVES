<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('id_rol')->nullable();
            $table->integer('id_persona')->nullable();
            $table->char('estado', 1)->default(0)->comment('1: Habilitado; 0:Deshabilitado');
            $table->char('is_deleted', 1)->default(0)->comment('1: Eliminado; 0:No Eliminado');
            $table->rememberToken()->nullable();
            $table->timestamps();

        });

        Schema::table('users', function($table) {
            $table->foreign('id_rol')->references('id_rol')->on('roles')->onDelete('cascade');
            $table->foreign('id_persona')->references('id_persona')->on('personas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
