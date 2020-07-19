<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'admin',
            'description' => 'Administrador'
        ]);

        DB::table('roles')->insert([
            'name' => 'secre',
            'description' => 'Secretaria'
        ]);

        DB::table('roles')->insert([
            'name' => 'docen',
            'description' => 'Docente'
        ]);

        DB::table('roles')->insert([
            'name' => 'alum',
            'description' => 'Alumno'
        ]);

    }
}
