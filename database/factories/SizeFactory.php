<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['XL','L','M','L','XL']),
    ];
});
