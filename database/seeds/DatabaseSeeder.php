<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ProfilesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersRolesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CategoryDetailsTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(ReportTypesTableSeeder::class);
        $this->call(ReportsTableSeeder::class);
        $this->call(ViolationsTableSeeder::class);
    }
}
