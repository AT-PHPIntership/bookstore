<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Repositories\RoleRepository as Role;

class RolesTableSeeder extends Seeder
{
  
    /**
     * Role
     *
     * @var role
     */
    private $role;
    
    /**
     * Create a new RoleRepository   instance.
     *
     * @param RoleRepository $role role
     *
     * @return void
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }
    
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
            $this->role->create([
                'role' => $roles[$i],
                'description' => $faker->text,
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }
    }
}
