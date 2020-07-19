<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	// Administradores

        DB::table('users')->insert([
            'id' => '75200120',
            'usuario' => '75200120',
            'password' => Hash::make('75200120')
        ]);

        DB::table('users')->insert([
            'id' => '70327395',
            'usuario' => '70327395',
            'password' => Hash::make('70327395')
        ]);

        // Secretaria

        DB::table('users')->insert([
            'id' => '25406106',
            'usuario' => '25406106',
            'password' => Hash::make('25406106')
        ]);        

        // Docentes

        DB::table('users')->insert([
            'id' => '25745094',
            'usuario' => '25745094',
            'password' => Hash::make('25745094')
        ]);

        DB::table('users')->insert([
            'id' => '25428530',
            'usuario' => '25428530',
            'password' => Hash::make('25428530')
        ]);

        DB::table('users')->insert([
            'id' => '75200163',
            'usuario' => '75200163',
            'password' => Hash::make('75200163')
        ]);

        // Alumnos

        DB::table('users')->insert([
            'id' => '75406456',
            'usuario' => '75406456',
            'password' => Hash::make('75406456')
        ]);

        DB::table('users')->insert([
            'id' => '75200134',
            'usuario' => '75200134',
            'password' => Hash::make('75200134')
        ]);

        DB::table('users')->insert([
            'id' => '75246604',
            'usuario' => '75246604',
            'password' => Hash::make('75246604')
        ]);

        DB::table('users')->insert([
            'id' => '75650012',
            'usuario' => '75650012',
            'password' => Hash::make('75650012')
        ]);

        DB::table('users')->insert([
            'id' => '79520105',
            'usuario' => '79520105',
            'password' => Hash::make('79520105')
        ]);

        DB::table('users')->insert([
            'id' => '78415200',
            'usuario' => '78415200',
            'password' => Hash::make('78415200')
        ]);



    }
}
