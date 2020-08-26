<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


$avatars = [
    'https://www.gravatar.com/avatar/89640b9f4acc3360d9cde6d246999534?s=400',
    'https://www.gravatar.com/avatar/f70f106decbb9f791d060f819ce38036?s=400',
];

$factory->define(User::class, function (Faker $faker) use ($avatars) {

    $date_time=$faker->date.' '.$faker->time;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'avatar'=>$faker->randomElement($avatars),
        'introduction'=>$faker->sentence(),
        'created_at'=>$date_time,
        'updated_at'=>$date_time,
    ];
});
