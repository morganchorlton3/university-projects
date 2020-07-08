<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Production
        //Roles
        $this->call(RolesTableSeeder::class);

        //Development
        //Users Table
        $this->call(UsersTableSeeder::class);
        $this->call(JobTableSeeder::class);
        //$this->call(CompanyTableSeeder::Class);
        //$this->call(CompanyRoleTableSeeder::class);



        $this->call(ClocksTableSeeder::class);
    }
}
