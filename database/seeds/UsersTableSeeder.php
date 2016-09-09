<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Repositories\UserRepository as User;

class UsersTableSeeder extends Seeder
{
    /**
     * User
     *
     * @var user
     */
    private $user;
    
    /**
     * Create a new UserRepository instance.
     *
     * @param UserRepository $user user
     *
     * @return void
     */
    public function __construct(User $user)
    {
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

        for ($i=0; $i < 50; $i++) {
            $this->user->create([
                'email' => $faker->email,
                'password' => bcrypt('12345678'),
                'isActive' => $faker->boolean(50),
                'remember_token' => str_random(60),
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }
    }
}
