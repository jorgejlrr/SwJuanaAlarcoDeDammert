<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenLineasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examen_linea', function (Blueprint $table) {
            $table->bigIncrements('exa_id');
            $table->integer('exa_idcurso');
            $table->string('exa_titulo',100);
            $table->text('exa_link');
            $table->integer('exa_iddocen');
            $table->timestamp('exa_fecha');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examen_lineas');
    }
}
