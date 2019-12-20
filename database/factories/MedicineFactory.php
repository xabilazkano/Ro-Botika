<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Medicine;
use Faker\Generator as Faker;

$factory->define(Medicine::class, function (Faker $faker) {
    return [
      'name' => $faker->word,
      'amount' => $faker->numberBetween($min = 5, $max = 25),
    ];
});
