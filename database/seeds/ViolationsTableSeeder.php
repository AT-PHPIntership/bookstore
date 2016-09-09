<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Repositories\ViolationRepository as Violation;
use App\Repositories\ArticleRepository as Article;
use App\Repositories\UserRepository as User;

class ViolationsTableSeeder extends Seeder
{
    /**
     * Violation
     *
     * @var violation
     */
    private $violation;
    
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
     * Create a new ViolationRepository instance.
     * Create a new ArticleRepository   instance.
     * Create a new UserRepository      instance.
     *
     * @param ViolationRepository $violation violation
     * @param ArticleRepository   $article   article
     * @param UserRepository      $user      user
     * 
     * @return void
     */
    public function __construct(Violation $violation, Article $article, User $user)
    {
        $this->violation = $violation;
        $this->article = $article;
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
        $articles = $this->article->all()->lists('id');
        $users = $this->user->all()->lists('id');
        for ($i=0; $i < 50; $i++) {
            $this->violation->create([
                'description' => $faker->text,
                'reviewer_id' => $faker->randomElement($users->toArray()),
                'article_id' => $faker->randomElement($articles->toArray()),
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }
    }
}
