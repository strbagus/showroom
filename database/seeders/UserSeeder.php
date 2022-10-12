<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

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
            [
                'name' => 'Mr SU',
                'email' => 'su@example.com',
                'password' => Hash::make('1sampai8'),
                'level' => 1,
            ],
            [
                'name' => 'Mr Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('1sampai8'),
                'level' => 2,
            ]
        ]);
    }
}
