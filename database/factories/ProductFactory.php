<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3, true),
        'description' => $faker->paragraph(2, true),
        'price' => $faker->randomFloat(2, 0, 999),
        'reference' => $faker->swiftBicNumber(),
    ];
});
