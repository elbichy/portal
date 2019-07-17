<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Contact;
use App\State;
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

$factory->define(Contact::class, function (Faker $faker) 
{

    $states = $faker->randomElement(['Abia','Adamawa','Akwa-ibom','Anambra','Bauchi','Bayelsa','Benue','Borno','Cross-river','Delta','Ebonyi','Edo','Ekiti','Enugu','Fct','Gombe','Imo','Jigawa','Kaduna','Kano','Katsina','Kebbi','Kogi','Kwara','Lagos','Nasarawa','Niger','Ogun','Ondo','Osun','Oyo','Plateau','Rivers','Sokoto','Taraba','Yobe','Zamfara']);
    return [
        'soo' => rand(10, 99),
        'soon' => $states,
        'lga' => rand(10, 99),
        'aoo' => $faker->address,
        'sor' => rand(10, 99),
        'sorn' => $states,
        'lgor' => rand(10, 99),
        'aor' => $faker->address
    ];
});
