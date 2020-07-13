<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->words(3, true),
        'description' => $faker->sentence(15),
        'long_description' => $faker->text,
        'price' => $faker->randomFloat(0, 1200, 2800),

        'category_id' => $faker->numberBetween(1, 5),
    ];
});
