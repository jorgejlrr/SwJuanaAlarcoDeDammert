<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsignaturaDocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asignatura_docente')->insert([
            'trab_id' => '4',
            'asig_id' => '1'
        ]);

        DB::table('asignatura_docente')->insert([
            'trab_id' => '4',
            'asig_id' => '2'
        ]);

        DB::table('asignatura_docente')->insert([
            'trab_id' => '5',
            'asig_id' => '3'
        ]);

        DB::table('asignatura_docente')->insert([
            'trab_id' => '5',
            'asig_id' => '4'
        ]);

        DB::table('asignatura_docente')->insert([
            'trab_id' => '6',
            'asig_id' => '5'
        ]);

        DB::table('asignatura_docente')->insert([
            'trab_id' => '6',
            'asig_id' => '6'
        ]);

    }
}
