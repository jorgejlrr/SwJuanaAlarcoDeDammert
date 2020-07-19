<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recurso')->insert([
            'rec_curso' => '1',
            'rec_bimestre' => '1',
            'rec_archivo' => '1587691288_Excel Prueba 1.xlsx',
            'rec_dni' => '75200163',
            'rec_rol' => '3',
            'rec_fechahora' => '2020-04-23 20:21:28'
        ]);

        DB::table('recurso')->insert([
            'rec_curso' => '1',
            'rec_bimestre' => '1',
            'rec_archivo' => '1587691431_Word Prueba 1.docx',
            'rec_dni' => '79520105',
            'rec_rol' => '4',
            'rec_fechahora' => '2020-04-23 20:23:51'
        ]);
    }
}
