<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(1, true),
        'description' => $faker->sentence(10, true),
        'price' => $faker->randomFloat(2, 0, 999),
        'reference' => $faker->swiftBicNumber(),
        'visibility' => $faker->randomElement($array = array('published', 'unpublished')),
        'status' => $faker->randomElement($array = array('solde', 'standard')),
    ];
});
