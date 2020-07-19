<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsignaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asignatura')->insert([
            'asig_id' => '1',
            'asig_nom' => 'Matemática'
        ]);

        DB::table('asignatura')->insert([
            'asig_id' => '2',
            'asig_nom' => 'Comunicación'
        ]);

        DB::table('asignatura')->insert([
            'asig_id' => '3',
            'asig_nom' => 'Ciencias Sociales'
        ]);

        DB::table('asignatura')->insert([
            'asig_id' => '4',
            'asig_nom' => 'Ciencia y Tecnología'
        ]);

        DB::table('asignatura')->insert([
            'asig_id' => '5',
            'asig_nom' => 'Arte y cultura'
        ]);

        DB::table('asignatura')->insert([
            'asig_id' => '6',
            'asig_nom' => 'Educación Física'
        ]);

        DB::table('asignatura')->insert([
            'asig_id' => '7',
            'asig_nom' => 'Inglés'
        ]);

        DB::table('asignatura')->insert([
            'asig_id' => '8',
            'asig_nom' => 'Ajedrez'
        ]);


    }
}
