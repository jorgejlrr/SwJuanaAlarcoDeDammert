<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->insert([
            'user_id' => '75200120',
            'role_id' => '1'
        ]);

        DB::table('role_user')->insert([
            'user_id' => '70327395',
            'role_id' => '1'
        ]);

        DB::table('role_user')->insert([
            'user_id' => '25406106',
            'role_id' => '2'
        ]);

		DB::table('role_user')->insert([
            'user_id' => '25745094',
            'role_id' => '3'
        ]);

        DB::table('role_user')->insert([
            'user_id' => '25428530',
            'role_id' => '3'
        ]);

        DB::table('role_user')->insert([
            'user_id' => '75200163',
            'role_id' => '3'
        ]);

        DB::table('role_user')->insert([
            'user_id' => '75200134',
            'role_id' => '4'
        ]);

        DB::table('role_user')->insert([
            'user_id' => '75246604',
            'role_id' => '4'
        ]);

        DB::table('role_user')->insert([
            'user_id' => '75406456',
            'role_id' => '4'
        ]);

        DB::table('role_user')->insert([
            'user_id' => '75650012',
            'role_id' => '4'
        ]);

        DB::table('role_user')->insert([
            'user_id' => '78415200',
            'role_id' => '4'
        ]);
        
        DB::table('role_user')->insert([
            'user_id' => '79520105',
            'role_id' => '4'
        ]);


    }
}
