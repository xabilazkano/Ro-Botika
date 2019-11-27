<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Usuario;
use Faker\Generator as Faker;

$factory->define(Usuario::class, function (Faker $faker) {
    return [
        'name'=>$faker->firstName,
        'lastname'=>$faker->lastName,
        'email'=>$faker->email,
        'phone_number'=>$faker->phoneNumber,
        'type_of_user'=>'admin'
    ];
});
