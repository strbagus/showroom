<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ref_type')->insert([
            ['name'=>'SUV'],
            ['name'=>'Sedan'],
            ['name'=>'Sport'],
            ['name'=>'Family'],
        ]);
    }
}
