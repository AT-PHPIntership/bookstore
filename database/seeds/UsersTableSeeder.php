<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 50; $i++) {
            User::create([
                'token' => str_random(60),
                'email' => $faker->email,
                'password' => bcrypt('12345678'),
                'isActive' => $faker->boolean(50),
                'remember_token' => str_random(60),
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }
    }
}
