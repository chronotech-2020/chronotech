<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Temperature;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use Faker\Generator as Faker;

$factory->define(Temperature::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'temperature' => $faker->randomFloat(null,33, 35)
    ];
});

