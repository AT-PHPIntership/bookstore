<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Repositories\CategoryRepository as Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Category
     *
     * @var category
     */
    private $category;
    
    /**
     * Create a new CategoryRepository instance.
     *
     * @param CategoryRepository $category category
     *
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $names = array("Books", "Furnitures", "Others");
        for ($i=0; $i < count($names); $i++) {
            $this->category->create([
                'name' => $names[$i],
                'slug' => str_slug($names[$i]),
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }
    }
}
