<?php

/** @var Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

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
$factory->define(App\Models\Job::class, static function (Faker $faker) {
    return [
        'name'         => $faker->sentence(3),
        'function'     => $faker->sentence(3),
        'description'  => $faker->paragraph(100, 10),
        'minimum_age'  => $minimum_age = $faker->numberBetween(17, 50),
        'maximum_age'  => $faker->numberBetween($minimum_age+1, 50),
        'open'         => $faker->dateTimeThisYear('now'),
        'close'        => $faker->dateTimeBetween('1 years', '+1 years'),
        'published'    => true,
        'education_id' => \App\Enums\Degree::getRandomValue()
    ];
});
