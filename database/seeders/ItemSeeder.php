<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mst_item')->insert([
            [
                "name"=>"Toyota Supra 1995",
                "merk"=>2,
                "model"=>4,
                "type"=>1,
                "price"=>785000000,
                "year"=>1995,
                "fuel"=>"Bensin",
                "cc"=>2350,
                "transmition"=>"Manual",
                "color"=>"Mate White",
                "mileage"=>56000,
                "desc"=>"Fast and Forious",
            ],
        ]);
    }
}
