<?php

/** @var Factory $factory */

use App\Models\ProgramStudy;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Laravolt\Indonesia\Models\District;

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
$factory->define(App\Models\UserProfile::class, static function (Faker $faker) {
    return [
        'no_identity'         => $faker->nik,
        'gender'              => $faker->randomElement(['Male', 'Female']),
        'address'             => $faker->address,
        'phone'               => $faker->phoneNumber,
        'birth_date'          => $faker->date('Y-m-d', '-15 years'),
        'current_address'     => $faker->address,
        'marital_status_id'   => \App\Enums\MaritalStatus::getRandomValue(),
        'religion_id'         => \App\Enums\Religion::getRandomValue(),
        'zip_code'            => $faker->postcode,
        'current_zip_code'    => $faker->postcode,
        'district_id'         => $district = District::inRandomOrder()->first()->id,
        'current_district_id' => District::inRandomOrder()->first()->id,
        'birth_place_id'      => \Indonesia::findCity(\Indonesia::findDistrict($district)->city_id)->id,
    ];
});
