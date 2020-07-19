<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumnoCursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alumno_curso')->insert([
            'curso_id' => '1',
            'alumno_id' => '4'
        ]);

        DB::table('alumno_curso')->insert([
            'curso_id' => '1',
            'alumno_id' => '5'
        ]);

        DB::table('alumno_curso')->insert([
            'curso_id' => '1',
            'alumno_id' => '6'
        ]);

        DB::table('alumno_curso')->insert([
            'curso_id' => '3',
            'alumno_id' => '1'
        ]);

        DB::table('alumno_curso')->insert([
            'curso_id' => '3',
            'alumno_id' => '2'
        ]);

        DB::table('alumno_curso')->insert([
            'curso_id' => '3',
            'alumno_id' => '3'
        ]);


    }

}
