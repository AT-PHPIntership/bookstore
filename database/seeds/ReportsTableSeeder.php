<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Report;

class ReportsTableSeeder extends Seeder
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
            Report::create([
                'description' => $faker->text,
                'article_id' => rand(1, 50),
                'reporter_id' => rand(1, 50),
                'report_type_id' => rand(1, 5),
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }
    }
}
