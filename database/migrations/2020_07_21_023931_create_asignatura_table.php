<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignaturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajador', function (Blueprint $table) {
            $table->increments('trab_id');
            $table->string('trab_dni',9);
            $table->string('trab_ape',70);
            $table->string('trab_nom',50);
            $table->integer('trab_sexo');
            $table->date('trab_fnac');
            $table->string('trab_email',100)->nullable();
            $table->string('trab_tel',11)->nullable();
            $table->integer('trab_est')->default(1);
            $table->integer('trab_user')->unsigned();

            $table->unique('trab_dni');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignatura');
    }
}
