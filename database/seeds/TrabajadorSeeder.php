<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrabajadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trabajador')->insert([
            'trab_id' => '1',
            'trab_dni' => '75200120',
            'trab_ape' => 'RAMIREZ RODRIGUEZ',
            'trab_nom' => 'JORGE LUIS',
            'trab_sexo' => '1',
            'trab_fnac' => '1999-10-14',
            'trab_user' => '75200120'
        ]);

        DB::table('trabajador')->insert([
            'trab_id' => '2',
            'trab_dni' => '70327395',
            'trab_ape' => 'RODRIGUEZ RICHARTE',
            'trab_nom' => 'JOSEPH JOQTAN',
            'trab_sexo' => '1',
            'trab_fnac' => '1999-03-20',
            'trab_user' => '70327395'
        ]);

        DB::table('trabajador')->insert([
            'trab_id' => '3',
            'trab_dni' => '25406106',
            'trab_ape' => 'OLARTE ARROYO',
            'trab_nom' => 'SONIA ISABEL',
            'trab_sexo' => '0',
            'trab_fnac' => '1991-02-01',
            'trab_user' => '25406106'
        ]);

        DB::table('trabajador')->insert([
            'trab_id' => '4',
            'trab_dni' => '25745094',
            'trab_ape' => 'FERREYRA COVEÑAS',
            'trab_nom' => 'JUAN MANUEL',
            'trab_sexo' => '1',
            'trab_fnac' => '1985-02-06',
            'trab_user' => '25745094'
        ]);

        DB::table('trabajador')->insert([
            'trab_id' => '5',
            'trab_dni' => '25428530',
            'trab_ape' => 'MURILLO LOPEZ',
            'trab_nom' => 'FRANCISCA DE PAULA',
            'trab_sexo' => '0',
            'trab_fnac' => '1992-07-12',
            'trab_user' => '25428530'
        ]);

        DB::table('trabajador')->insert([
            'trab_id' => '6',
            'trab_dni' => '75200163',
            'trab_ape' => 'ATAPOMA ACUÑA',
            'trab_nom' => 'BRUCE ANTHONY',
            'trab_sexo' => '1',
            'trab_fnac' => '1989-02-05',
            'trab_user' => '75200163'
        ]);
        
    }
}
