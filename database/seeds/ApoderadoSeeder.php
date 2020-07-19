<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApoderadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('apoderado')->insert([
            'apod_id' => '1',
            'apod_dni' => '06540979',
            'apod_ape' => 'CAVERO FALLA',
            'apod_nom' => 'ALBERTO NEMESIO',
            'apod_sexo' => '1',
            'apod_email' => 'alberto_cavero@gmail.com',
            'apod_tel' => '952632102'
        ]);

        DB::table('apoderado')->insert([
            'apod_id' => '2',
            'apod_dni' => '25406456',
            'apod_ape' => 'ALVAREZ PERALTA',
            'apod_nom' => 'LUIS',
            'apod_sexo' => '1',
            'apod_email' => 'lalvarezp@hotmail.com',
            'apod_tel' => '998741036'
        ]);

        DB::table('apoderado')->insert([
            'apod_id' => '3',
            'apod_dni' => '48509790',
            'apod_ape' => 'AVILA BRAVO',
            'apod_nom' => 'VIOLETA',
            'apod_sexo' => '0',
            'apod_email' => 'v.avila@hotmail.com'
        ]);

        DB::table('apoderado')->insert([          
            'apod_id' => '4',
            'apod_dni' => '41529163',
            'apod_ape' => 'LACHI AGÜERO',
            'apod_nom' => 'NANCY ELIZABETH',
            'apod_sexo' => '0',
            'apod_email' => 'nancy_lachi@hotmail.com',
            'apod_tel' => '974855240'
        ]);

        DB::table('apoderado')->insert([
            'apod_id' => '5',
            'apod_dni' => '40456077',
            'apod_ape' => 'TACSA ORELLANA',
            'apod_nom' => 'MABEL ROCIO',
            'apod_sexo' => '0',
            'apod_email' => 'mtacsa@gmail.com',
            'apod_tel' => '985744128'
        ]);

        DB::table('apoderado')->insert([
            'apod_id' => '6',
            'apod_dni' => '74078065',
            'apod_ape' => 'ARROYO PAREDES',
            'apod_nom' => 'ALDAIR YOE',
            'apod_sexo' => '1',
            'apod_email' => 'aldair.arroyo5@gmail.com',
            'apod_tel' => '957411237'
        ]);

    }
}
