<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->integer('id_matricula')->autoIncrement();
            $table->integer('id_alumno')->nullable();
            $table->integer('id_periodo')->nullable();
            $table->integer('id_nivel')->nullable();
            $table->integer('id_grado')->nullable();
            $table->integer('id_seccion')->nullable();
            $table->date('fecha_matricula')->nullable();
            $table->char('is_deleted', 1)->default(0)->comment('1: Eliminado; 0:No Eliminado');
        });

        Schema::table('matriculas', function($table) {
            $table->foreign('id_alumno')->references('id_alumno')->on('alumnos')->onDelete('cascade');
            $table->foreign('id_periodo')->references('id_periodo')->on('periodos')->onDelete('cascade');
            $table->foreign('id_nivel')->references('id_nivel')->on('niveles')->onDelete('cascade');
            $table->foreign('id_grado')->references('id_grado')->on('grados')->onDelete('cascade');
            $table->foreign('id_seccion')->references('id_seccion')->on('secciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriculas');
    }
}
