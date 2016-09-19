<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Repositories\ProfileRepository as Profile;
use App\Repositories\UserRepository as User;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Profile
     *
     * @var profile
     */
    private $profile;
    
    /**
     * User
     *
     * @var user
     */
    private $user;
    
    /**
     * Create a new ProfileRepository instance.
     * Create a new UserRepository    instance.
     *
     * @param ProfileRepository $profile profile
     * @param UserRepository    $user    user
     *
     * @return void
     */
    public function __construct(Profile $profile, User $user)
    {
        $this->profile = $profile;
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
        $users = $this->user->all()->lists('id');
        for ($i=0; $i < 50; $i++) {
            $this->profile->create([
                'name' => $faker->name,
                'birthday' => $faker->dateTimeBetween('-40 years', '-18 years')->format('d/m/Y'),
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'gender' => $faker->boolean(33),
                'user_id' => $users[$i],
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }
    }
}
