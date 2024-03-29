<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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

$factory->define(User::class, function (Faker $faker) 
{
    $start_date = '2019-06-01 00:00:00';
    $end_date = '2019-07-01 00:00:00';

    $min = strtotime($start_date);
    $max = strtotime($end_date);

    // Generate random number using above bounds
    $val = rand($min, $max);

    // Convert back to desired date format
    $date = new DateTime(date('Y-m-d H:i:s', $val));
    
    $gender = $faker->randomElement(['male', 'female']);
    return [
        'firstname' => $faker->firstName($gender),
        'lastname' => $faker->lastName($gender),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('@Suleimanu1'), // password
        'remember_token' => Str::random(10),
        'phone' => '080'.$faker->shuffle('50811702'),
        'cadre_id' => $faker->numberBetween($min = 1, $max = 3),
        'rank_id' => $faker->numberBetween($min = 1, $max = 7),
        'gl' => $faker->numberBetween($min = 3, $max = 9),
        'hasSubmitted' => 1,
        'isAdmin' => 0,
        'isShortlisted' => 0,
        'created_at' => $date
    ];
});
