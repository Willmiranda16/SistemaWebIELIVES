<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->integer('id_persona')->autoIncrement();
            $table->char('dni', 8)->unique();
            $table->string('nombres', 200)->nullable();
            $table->string('apellidos', 200)->nullable();
            $table->char('sexo', 1)->default(0)->comment('M: Masculino; F:Femenino');
            $table->date('fecha_nacimiento')->nullable();
            $table->integer('celular')->nullable();
            $table->char('is_deleted', 1)->default(0)->comment('1: Eliminado; 0:No Eliminado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona');
    }
}
