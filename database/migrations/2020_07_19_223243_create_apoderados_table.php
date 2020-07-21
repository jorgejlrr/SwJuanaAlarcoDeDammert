<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApoderadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apoderado', function (Blueprint $table) {
            $table->increments('apod_id');
            $table->string('apod_dni',8);
            $table->string('apod_ape',70);
            $table->string('apod_nom',70);
            $table->integer('apod_sexo');
            $table->string('apod_email',70)->nullable();
            $table->string('apod_tel',11)->nullable();

            $table->unique('apod_dni');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apoderados');
    }
}
