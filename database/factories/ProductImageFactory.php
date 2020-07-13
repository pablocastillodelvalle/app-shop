<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductImage;
use Faker\Generator as Faker;

$factory->define(ProductImage::class, function (Faker $faker) {
    return [
        'image' =>$faker->imageUrl($width = 250, $height = 250),
        'product_id' =>$faker->numberBetween(1, 100),
    ];
});
