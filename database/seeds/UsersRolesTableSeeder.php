<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\UserRole;

class UsersRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        for ($i=0; $i < 10; $i++) {
            UserRole::create([
                'user_id' => rand(1,50),
                'role_id' => rand(1,4),
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }
    }
}
