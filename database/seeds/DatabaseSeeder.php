<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
        	UserSeeder::class,
            TrabajadorSeeder::class,
            RoleUserSeeder::class,
            AsignaturaSeeder::class,
            AsignaturaDocenteSeeder::class,
        	ApoderadoSeeder::class,
            AlumnoSeeder::class,
            CursoSeeder::class,
            AlumnoCursoSeeder::class,
            RecursoSeeder::class
        ]);
    }
}
