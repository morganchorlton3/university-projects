<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Role;
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


$factory->define(User::class, function (Faker $faker) {
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->afterCreating(User::class, function($user, $faker){
    $roles = Role::where('name', 'user')->get();
    $user->roles()->sync($roles->pluck('id')->toArray());
});
