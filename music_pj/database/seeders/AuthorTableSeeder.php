<?php

namespace Database\Seeders;

use Faker\Provider\Base as BaseProvider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class AuthorTableSeeder extends Seeder
{

    public function run(): void
    {
        $faker = Faker::create();
        for($i=0; $i<20 ; $i++){
            DB::table('tacgia')->insert([
                'ten_tgia' => $faker->name
            ]);
        }
    }
}
