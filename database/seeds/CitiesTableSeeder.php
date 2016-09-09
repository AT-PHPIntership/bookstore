<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Repositories\CityRepository as City;

class CitiesTableSeeder extends Seeder
{
    /**
     * City
     *
     * @var city
     */
    private $city;
    
    /**
     * Create a new CityRepository instance.
     *
     * @param CityRepository $city city
     *
     * @return void
     */
    public function __construct(City $city)
    {
        $this->city = $city;
    }
  
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 54; $i++) {
            $this->city->create([
                'name' => $faker->city,
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }
    }
}
