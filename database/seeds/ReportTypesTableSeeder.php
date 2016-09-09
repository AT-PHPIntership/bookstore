<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Repositories\ReportTypeRepository as ReportType;

class ReportTypesTableSeeder extends Seeder
{   
    /**
     * ReportType
     *
     * @var reportType
     */
    private $reportType;
    
    /**
     * Create a new ReportTypeRepository   instance.
     *
     * @param ReportTypeRepository $reportType reportType
     *
     * @return void
     */
    public function __construct(ReportType $reportType)
    {
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
        
        $types = array("Cheating", "Repeated", "Sold", "Can not contact", "Invalid information");
        for ($i=0; $i < count($types); $i++) {
            $this->reportType->create([
                'type' => $types[$i],
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }
    }
}
