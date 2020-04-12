<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Coupon;
use Faker\Generator as Faker;

$factory->define(Coupon::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'link' => $faker->domainName,
        'amount' => $faker->randomNumber(5),
        'code' => $faker->unique()->numberBetween(11111,99999),
        'type' => $faker->randomElement(['plain', 'unique'])
    ];
});
