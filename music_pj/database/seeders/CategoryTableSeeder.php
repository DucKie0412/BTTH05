<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Faker\Provider\Base as BaseProvider;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for($i=0; $i<20 ; $i++){
            DB::table('theloai')->insert([
               'ten_tloai'=>$faker->text(5)
            ]);
        }
    }
}
