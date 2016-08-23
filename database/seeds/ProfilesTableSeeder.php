<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Profile;
use App\Models\User;

class ProfilesTableSeeder extends Seeder
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
            $user = Profile::create([
                'name' => $faker->name,
                'birthday' => $faker->dateTimeBetween('-40 years', '-18 years')->format('d/m/Y'),
                'address' => $faker->address,
                'phoneNumber' => $faker->phoneNumber,
                'gender' => $faker->boolean(33),
                'user_id' => User::all()->random(1)->id,
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }
    }
}
