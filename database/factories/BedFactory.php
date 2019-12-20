<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bed;
use Faker\Generator as Faker;

$factory->define(Bed::class, function (Faker $faker) {
    return [
      'floor' => $faker->numberBetween($min = 0, $max = 4),
      'room' => $faker->numberBetween($min = 1, $max = 30),
      'bed' => $faker->randomElement($array = array ('a','b')),
    ];
});
