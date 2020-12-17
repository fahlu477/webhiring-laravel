<?php

/** @var Factory $factory */

use App\Models\ProgramStudy;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Laravolt\Indonesia\Models\City;

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
$factory->define(App\Models\UserEducation::class, static function (Faker $faker) {
    return [
        'degree_id'        => \App\Enums\Degree::getRandomValue(),
        'program_study_id' => ProgramStudy::inRandomOrder()->first()->id,
        'city_id'          => City::inRandomOrder()->first()->id,
        'school_name'      => $faker->sentence('2'),
        'gpa'              => $faker->randomFloat('2', '1', '4'),
        'graduation'       => $graduation = $faker->year('now'),
        'entry'            => $graduation - random_int(3, 5),
    ];
});
