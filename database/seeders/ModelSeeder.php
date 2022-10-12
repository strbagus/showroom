<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ref_model')->insert([
            ['name'=>'Jazz', 'merk_id'=>1],
            ['name'=>'Civic', 'merk_id'=>1],
            ['name'=>'Avanza', 'merk_id'=>2],
            ['name'=>'Supra', 'merk_id'=>2],
            ['name'=>'Hummer', 'merk_id'=>3],
            ['name'=>'Rubicon', 'merk_id'=>3],
        ]);
    }
}
