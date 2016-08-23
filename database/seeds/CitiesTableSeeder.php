<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 54; $i++) {
            City::create([
                'name' => $faker->city,
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }
    }
}
