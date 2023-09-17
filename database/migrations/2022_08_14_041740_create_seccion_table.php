<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secciones', function (Blueprint $table) {
            $table->integer('id_seccion')->autoIncrement();
            $table->string('descripcion', 200)->nullable();
            $table->integer('vacantes')->default(0);
            $table->integer('id_grado')->nullable();
        });

        Schema::table('secciones', function($table) {
            $table->foreign('id_grado')->references('id_grado')->on('grados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('secciones');
    }
}
