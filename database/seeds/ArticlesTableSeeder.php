<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Repositories\ArticleRepository as Article;
use App\Repositories\CategoryDetailRepository as CategoryDetail;
use App\Repositories\CityRepository as City;
use App\Repositories\UserRepository as User;

class ArticlesTableSeeder extends Seeder
{
    /**
     * CategoryDetail
     *
     * @var categoryDetail
     */
    private $categoryDetail;
    
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
     * Create a new CategoryDetailRepository instance.
     * Create a new ArticleRepository        instance.
     * Create a new CityRepository           instance.
     * Create a new UserRepository           instance.
     *
     * @param CategoryDetailRepository $categoryDetail categoryDetail
     * @param ArticleRepository        $article        article
     * @param CityRepository           $city           city
     * @param UserRepository           $user           user
     *
     * @return void
     */
    public function __construct(CategoryDetail $categoryDetail, Article $article, City $city, User $user)
    {
        $this->categoryDetail = $categoryDetail;
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
        $states = array("active", "waiting", "hidden", "rejected");
        $types = array("buy", "sell");
        $categorie_details = $this->categoryDetail->all()->lists('id');
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
                'category_detail_id' => $faker->randomElement($categorie_details->toArray()),
                'city_id' => $faker->randomElement($cities->toArray()),
                'user_id' => $faker->randomElement($users->toArray()),
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }
    }
}
