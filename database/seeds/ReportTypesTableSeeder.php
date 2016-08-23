<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\ReportType;

class ReportTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $faker = Faker::create();
        
        $types = array("Cheating", "Repeated", "Sold", "Can not contact", "Invalid information");
        for ($i=0; $i < 5; $i++) {
            ReportType::create([
                'type' => $types[$i],
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }
    }
}
