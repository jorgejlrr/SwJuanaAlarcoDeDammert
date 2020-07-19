<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('curso')->insert([
            'curs_id' => '1',
            'curs_iddocen' => '6',
            'curs_idasig' => '5',
            'curs_grado' => '4',
            'curs_año' => '2020'
        ]);

        DB::table('curso')->insert([
            'curs_iddocen' => '5',
            'curs_idasig' => '4',
            'curs_grado' => '4',
            'curs_año' => '2020'
        ]);

        DB::table('curso')->insert([
            'curs_iddocen' => '4',
            'curs_idasig' => '1',
            'curs_grado' => '3',
            'curs_año' => '2020'
        ]);
        
    }
}
