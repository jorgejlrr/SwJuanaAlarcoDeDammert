<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alumno')->insert([
            'alum_id' => '1',
            'alum_dni' => '75406456',
            'alum_ape' => 'CAVERO AVILA',
            'alum_nom' => 'MARIA CARMEN',
            'alum_sexo' => '0',
            'alum_fnac' => '2006-02-05',
            'alum_grad' => '3',
            'alum_apod' => '1',
            'alum_user' => '75406456'
        ]);

        DB::table('alumno')->insert([
            'alum_id' => '2',
            'alum_dni' => '75200134',
            'alum_ape' => 'ALVAREZ AGUILAR',
            'alum_nom' => 'JUAN DIEGO',
            'alum_sexo' => '1',
            'alum_fnac' => '2006-08-20',
            'alum_grad' => '3',
            'alum_apod' => '2',
            'alum_user' => '75200134'
        ]);

        DB::table('alumno')->insert([
            'alum_id' => '3',
            'alum_dni' => '75246604',
            'alum_ape' => 'SALAZAR AVILA',
            'alum_nom' => 'CARLA',
            'alum_sexo' => '0',
            'alum_fnac' => '2006-07-11',
            'alum_grad' => '3',
            'alum_apod' => '3',
            'alum_user' => '75246604'
        ]);

        DB::table('alumno')->insert([
            'alum_id' => '4',
            'alum_dni' => '75650012',
            'alum_ape' => 'ROBLES LACHI',
            'alum_nom' => 'DIANA',
            'alum_sexo' => '0',
            'alum_fnac' => '2005-01-06',
            'alum_grad' => '4',
            'alum_apod' => '4',
            'alum_user' => '75650012'
        ]);

        DB::table('alumno')->insert([
            'alum_id' => '5',
            'alum_dni' => '79520105',
            'alum_ape' => 'CHUMPITAZ TACSA',
            'alum_nom' => 'ELSA',
            'alum_sexo' => '0',
            'alum_fnac' => '2005-10-12',
            'alum_grad' => '4',
            'alum_apod' => '5',
            'alum_user' => '79520105'
        ]);

        DB::table('alumno')->insert([
            'alum_id' => '6',
            'alum_dni' => '78415200',
            'alum_ape' => 'ARROYO HUAMAN',
            'alum_nom' => 'DAVID',
            'alum_sexo' => '1',
            'alum_fnac' => '2005-08-28',
            'alum_grad' => '4',
            'alum_apod' => '6',
            'alum_user' => '78415200'
        ]);


    }
}
