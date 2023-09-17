<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grados', function (Blueprint $table) {
            $table->integer('id_grado')->autoIncrement();
            $table->string('descripcion', 200)->nullable();
            $table->integer('id_nivel')->nullable();
        });

        Schema::table('grados', function($table) {
            $table->foreign('id_nivel')->references('id_nivel')->on('niveles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grados');
    }
}
