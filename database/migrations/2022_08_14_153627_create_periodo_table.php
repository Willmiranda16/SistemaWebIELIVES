<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodos', function (Blueprint $table) {
            $table->integer('id_periodo')->autoIncrement();
            $table->string('descripcion', 200)->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->char('estado', 1)->default(0)->comment('1: Aperturado; 2:Finalizado');
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
        Schema::dropIfExists('periodos');
    }
}
