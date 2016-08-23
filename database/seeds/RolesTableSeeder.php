<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        $roles = array("RootAdmin", "Admin", "User", "Guest");
        for ($i=0; $i < count($roles); $i++) {
            Role::create([
                'role' => $roles[$i],
                'description' => $faker->text,
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }
    }
}
