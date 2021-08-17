<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Emma',
            'email' => 'emma@gmail.com',
            'age' => '20',
            'points' => 0,
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Noah',
            'email' => 'noah@gmail.com',
            'age' => '22',
            'points' => 0,
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'James',
            'email' => 'james@gmail.com',
            'age' => '27',
            'points' => 0,
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'William',
            'email' => 'william@gmail.com',
            'age' => '33',
            'points' => 0,
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Olivia',
            'email' => 'olivia@gmail.com',
            'age' => '31',
            'points' => 0,
            'password' => Hash::make('password'),
        ]);
    }
}
