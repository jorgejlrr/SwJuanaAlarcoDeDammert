<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recurso', function (Blueprint $table) {
            $table->bigIncrements('rec_id');
            $table->integer('rec_curso');
            $table->integer('rec_bimestre');
            $table->string('rec_archivo',180);
            $table->string('rec_dni',9);
            $table->integer('rec_rol');
            $table->timestamp('rec_fechahora');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recursos');
    }
}
