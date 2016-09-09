<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Repositories\CategoryRepository as Category;
use App\Repositories\CategoryDetailRepository as CategoryDetail;

class CategoryDetailsTableSeeder extends Seeder
{
    /**
     * Category
     *
     * @var category
     */
    private $category;
    
    /**
     * CategoryDetail
     *
     * @var categoryDetail
     */
    private $categoryDetail;
    
    /**
     * Create a new CategoryRepository instance.
     *
     * @param CategoryRepository $category category
     *
     * @return void
     */
    public function __construct(Category $category, CategoryDetail $categoryDetail)
    {
        $this->category = $category;
        $this->categoryDetail = $categoryDetail;
    }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $names = array("Information Technology", "Mechanical Engineering", 
          "Biotechnology Engineering", "Civil Engineering", "Electronic Engineering", "Others");
        $categories = $this->category->all()->lists('id');
        for ($i=0; $i < count($names); $i++) {
            $this->categoryDetail->create([
                'name' => $names[$i],
                'slug' => str_slug($names[$i]),
                'category_id' => $faker->randomElement($categories->toArray()),
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }
    }
}
