<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Support;
use Faker\Generator as Faker;


$factory->define(Support::class, function (Faker $faker) {
    return  [
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'slug' => $faker->slug,
        'body' => $faker->text($maxNbChars = 3000),
        'status' => 1,
    ];
});
