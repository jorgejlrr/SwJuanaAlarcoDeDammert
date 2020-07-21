<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno', function (Blueprint $table) {
            $table->increments('alum_id');
            $table->string('alum_dni',8);
            $table->string('alum_ape',70);
            $table->string('alum_nom',70);
            $table->integer('alum_sexo');
            $table->date('alum_fnac');
            $table->integer('alum_grad');
            $table->integer('alum_est')->default(1);
            $table->integer('alum_apod');
            $table->integer('alum_user')->unsigned();

            $table->unique('alum_dni');
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
