<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $names = array("Books", "Funitures","Others");
        for ($i=0; $i < count($names); $i++) {
            Category::create([
                'name' => $names[$i],
                'slug' => str_slug($names[$i]),
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }
    }
}
