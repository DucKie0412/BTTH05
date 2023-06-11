<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $authorIds = DB::table('tacgia')->pluck('ma_tgia')->toArray();
        $categoryIds = DB::table('theloai')->pluck('ma_tloai')->toArray();

        for ($i = 0; $i < 20; $i++) {
            $authorId = $faker->randomElement($authorIds);
            $categoryId = $faker->randomElement($categoryIds);

            DB::table('baiviet')->insert([

                'tieude' => $faker->text(20),
                'ten_bhat' => $faker->name,
                'ma_tloai' => $categoryId,
                'tomtat' => $faker->text(20),
                'noidung' => $faker->text(30),
                'ma_tgia' => $authorId,
                'ngayviet' => $faker->dateTime
            ]);
        }

    }
}
