<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Personal;
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

$factory->define(Personal::class, function (Faker $faker) 
{
    $start_date = '1985-01-01 00:00:00';
    $end_date = '1995-01-01 00:00:00';

    $min = strtotime($start_date);
    $max = strtotime($end_date);

    // Generate random number using above bounds
    $val = rand($min, $max);

    // Convert back to desired date format
    $date = new DateTime(date('Y-m-d H:i:s', $val));

    $gender = $faker->randomElement(['male', 'female']);
    return [
        'othername' => $faker->firstName($gender),
        'gender' => $gender,
        'dob' => $date,
        'tribe' => $faker->randomElement(['hausa', 'igbo', 'yoruba']),
        'religion' => $faker->randomElement(['christianity', 'islam', 'other'])
    ];
});
