<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        //Admin Role
        Role::create([
            'name' => 'admin'
        ]);
        //Manager Role
        Role::create([
            'name' => 'manager'
        ]);
        //company User Role
        Role::create([
            'name' => 'companyUser'
        ]);
        //user Role
        Role::create([
            'name' => 'user'
        ]);
    }
}
