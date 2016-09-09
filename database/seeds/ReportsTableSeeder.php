<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Repositories\ReportRepository as Report;
use App\Repositories\UserRepository as User;
use App\Repositories\ArticleRepository as Article;
use App\Repositories\ReportTypeRepository as ReportType;

class ReportsTableSeeder extends Seeder
{   
    /**
     * Report
     *
     * @var report
     */
    private $report;
    
    /**
     * User
     *
     * @var user
     */
    private $user;
    
    /**
     * Article
     *
     * @var article
     */
    private $article;
    
    /**
     * ReportType
     *
     * @var reportType
     */
    private $reportType;
    
    /**
     * Create a new ReportRepository       instance.
     * Create a new UserRepository         instance.
     * Create a new ArticleRepository      instance.
     * Create a new ReportTypeRepository   instance.
     *
     * @param ReportRepository     $report     report
     * @param UserRepository       $user       user
     * @param ArticleRepository    $article    article
     * @param ReportTypeRepository $reportType reportType
     *
     * @return void
     */
    public function __construct(Report $report, User $user, Article $article, ReportType $reportType)
    {
        $this->report = $report;
        $this->user = $user;
        $this->article = $article;
        $this->reportType = $reportType;
    }
  
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $reporters = $this->user->all()->lists('id');
        $articles = $this->article->all()->lists('id');
        $reportTypes = $this->reportType->all()->lists('id');
        for ($i=0; $i < 300; $i++) {
            $this->report->create([
                'description' => $faker->text,
                'article_id' => $faker->randomElement($articles->toArray()),
                'reporter_id' => $faker->randomElement($reporters->toArray()),
                'report_type_id' => $faker->randomElement($reportTypes->toArray()),
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }
    }
}
