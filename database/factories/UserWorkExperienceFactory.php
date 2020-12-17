<?php

/** @var Factory $factory */

use App\Models\ProgramStudy;
use Carbon\Carbon;
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
$factory->define(App\Models\UserWorkExperience::class, static function (Faker $faker) {
    return [
        'company'     => $faker->company,
        'industry'    => $faker->sentence,
        'title'       => $faker->jobTitle,
        'description' => $faker->paragraph,
        'join'        => $join = $faker->date('Y-m-d', 'now'),
        'out'         => Carbon::parse($join)->addYears(random_int(1, 5)),
    ];
});
