<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Repositories\ArticleRepository as Article;
use App\Repositories\CategoryRepository as Category;
use App\Repositories\CityRepository as City;
use App\Repositories\UserRepository as User;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Category
     *
     * @var category
     */
    private $category;
    
    /**
     * City
     *
     * @var city
     */
    private $city;
    
    /**
     * Article
     *
     * @var article
     */
    private $article;
    
    /**
     * User
     *
     * @var user
     */
    private $user;
    
    /**
     * Create a new CategoryRepository instance.
     * Create a new ArticleRepository  instance.
     * Create a new CityRepository     instance.
     * Create a new UserRepository     instance.
     *
     * @param CategoryRepository $category category
     * @param ArticleRepository  $article  article
     * @param CityRepository     $city     city
     * @param UserRepository     $user     user
     *
     * @return void
     */
    public function __construct(Category $category, Article $article, City $city, User $user)
    {
        $this->category = $category;
        $this->article = $article;
        $this->city = $city;
        $this->user = $user;
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
        $cities = $this->city->all()->lists('id');
        $users = $this->user->all()->lists('id');
        for ($i=0; $i < 50; $i++) {
            $title = $faker->text;
            $this->article->create([
                'title' => $title,
                'description' => $faker->text,
                'state' => $states[rand(0, 3)],
                'type' => $types[rand(0, 1)],
                'price' => rand(1, 50) * 10,
                'slug' => str_slug($title),
                'category_id' => $faker->randomElement($categories->toArray()),
                'city_id' => $faker->randomElement($cities->toArray()),
                'user_id' => $faker->randomElement($users->toArray()),
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }
    }
}
