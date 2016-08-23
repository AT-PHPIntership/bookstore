<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Violation;

class ViolationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 50; $i++) {
            Violation::create([
                'description' => $faker->text,
                'reviewer_id' => rand(1,50),
                'article_id' => rand(1,50),
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }
    }
}
