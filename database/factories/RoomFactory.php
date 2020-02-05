<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Room;
use Faker\Generator as Faker;

$factory->define(Room::class, function (Faker $faker) {
    return [
      'floor' => 1,
      'room_number' => $faker->numberBetween($min = 1, $max = 30),
      'beds' => 2,
    ];
});
