<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Repositories\ImageRepository as Image;
use App\Repositories\ArticleRepository as Article;

class ImagesTableSeeder extends Seeder
{
    /**
     * Image
     *
     * @var image
     */
    private $image;
    
    /**
     * Article
     *
     * @var article
     */
    private $article;
    
    /**
     * Create a new ImageRepository   instance.
     * Create a new ArticleRepository instance.
     *
     * @param ImageRepository   $image    image
     * @param ArticleRepository $article article
     *
     * @return void
     */
    public function __construct(Image $image, Article $article)
    {
        $this->image = $image;
        $this->article = $article;
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
        for ($i=0; $i < 300; $i++) {
            $this->image->create([
                'name' => $faker->word.'.png',
                'article_id' => $faker->randomElement($articles->toArray()),
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }
    }
}
