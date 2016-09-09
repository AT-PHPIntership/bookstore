<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Article;
use App\Repositories\CategoryRepository as Category;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Artcile
     *
     * @var article
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
        $states = array("Active", "Waiting", "Hidden", "Rejected");
        $types = array("Buy", "Sell");
        $categories = $this->category->all()->lists('id');
        for ($i=0; $i < 50; $i++) {
            $title = $faker->text;
            Article::create([
                'title' => $title,
                'description' => $faker->text,
                'state' => $states[rand(0, 3)],
                'type' => $types[rand(0, 1)],
                'price' => rand(1, 50) * 10,
                'slug' => str_slug($title),
                'category_id' => $faker->randomElement($categories->toArray()),
                'city_id' => rand(1, 50),
                'user_id' => rand(1, 50),
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }
    }
}
