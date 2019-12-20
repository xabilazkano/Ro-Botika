<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    return [
      'ss_number' => $faker->numerify('###########'),
      'name' => $faker->firstname,
      'lastname' => $faker->lastname,
      'disease' =>$faker->word,
    ];
});
