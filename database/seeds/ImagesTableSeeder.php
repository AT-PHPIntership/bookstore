<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Image;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 300; $i++) {
            Image::create([
                'name' => $faker->word.'.png',
                'article_id' => rand(1, 50),
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }
    }
}
