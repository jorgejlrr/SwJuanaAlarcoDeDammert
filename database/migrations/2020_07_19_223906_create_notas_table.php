<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->bigIncrements('not_id');
            $table->integer('not_idcurso');
            $table->integer('not_idalumno');
            $table->integer('not_n1');
            $table->integer('not_n2');
            $table->integer('not_n3');
            $table->integer('not_promedio');
            $table->integer('not_bimestre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
