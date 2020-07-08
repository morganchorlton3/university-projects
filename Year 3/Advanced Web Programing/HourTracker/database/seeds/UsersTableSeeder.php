<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //clear users and roles table
        User::truncate();
        DB::table('role_user')->truncate();

        //roles
        $adminRole = Role::where('name', 'admin')->first();
        $managerRole = Role::where('name', 'manager')->first();

        //user
        $admin1 = User::create([
            'firstName' => 'Owner',
            'lastName' => 'User',
            'email' => 'owner@hourtracker.digital',
            'password' => Hash::make('adminpass'),
            'email_verified_at' => Carbon\Carbon::now()
        ]);

        $manager1 = User::create([
            'firstName' => 'Manager',
            'lastName' => 'User',
            'email' => 'manager@hourtracker.digital',
            'password' => Hash::make('managerpass'),
            'email_verified_at' => Carbon\Carbon::now()
        ]);
 
        //atach roles
        $admin1->roles()->attach($adminRole);
        $manager1->roles()->attach($managerRole);



         //factory
         factory(App\User::class, 50)->create();
    }
}
