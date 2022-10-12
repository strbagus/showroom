<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class MerkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ref_merk')->insert([
            ['name'=>'Honda', 'img_path'=>null],
            ['name'=>'Toyota', 'img_path'=>null],
            ['name'=>'Jeep', 'img_path'=>null],
        ]);
    }
}
