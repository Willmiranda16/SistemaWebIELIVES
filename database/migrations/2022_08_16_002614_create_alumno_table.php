<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->integer('id_alumno')->autoIncrement();
            $table->integer('id_persona')->nullable();
            $table->integer('id_apoderado')->nullable();
            $table->char('estado', 1)->default(0)->comment('1: Activo; 2:Inactivo; 3:Retirado');
            $table->char('is_deleted', 1)->default(0)->comment('1: Eliminado; 0:No Eliminado');
        });

        Schema::table('alumnos', function($table) {
            $table->foreign('id_persona')->references('id_persona')->on('personas')->onDelete('cascade');
            $table->foreign('id_apoderado')->references('id_apoderado')->on('apoderados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
