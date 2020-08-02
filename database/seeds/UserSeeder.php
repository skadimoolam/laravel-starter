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
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@test.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ],
        ]);
    }
}
