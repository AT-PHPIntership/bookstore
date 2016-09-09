<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Repositories\UserRoleRepository as UserRole;
use App\Repositories\UserRepository as User;
use App\Repositories\RoleRepository as Role;

class UsersRolesTableSeeder extends Seeder
{
    /**
     * UserRole
     *
     * @var userRole
     */
    private $userRole;
    
    /**
     * User
     *
     * @var user
     */
    private $user;
    
    /**
     * Role
     *
     * @var role
     */
    private $role;
    
    /**
     * Create a new UserRoleRepository instance.
     * Create a new UserRepository     instance.
     * Create a new RoleRepository     instance.
     *
     * @param UserRoleRepository $userRole userRole
     * @param UserRepository     $user     user
     * @param RoleRepository     $role     role
     *
     * @return void
     */
    public function __construct(UserRole $userRole, User $user, Role $role)
    {
        $this->userRole = $userRole;
        $this->user = $user;
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
        $users = $this->user->all()->lists('id');
        $roles = $this->role->all()->lists('id');
        for ($i=0; $i < 10; $i++) {
            $this->userRole->create([
                'user_id' => $faker->randomElement($users->toArray()),
                'role_id' => $faker->randomElement($roles->toArray()),
                'created_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }
    }
}
