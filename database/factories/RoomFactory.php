<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Room;
use Faker\Generator as Faker;

$factory->define(Room::class, function (Faker $faker) {
    return [
      'floor' => $faker->numberBetween($min = 0, $max = 4),
      'room_number' => $faker->numberBetween($min = 1, $max = 30),
      'beds' => $faker->numberBetween($min = 1, $max = 4),
    ];
});
