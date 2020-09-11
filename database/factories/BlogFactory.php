<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return  [
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'slug' => $faker->slug,
        'summary'=>$faker->sentence($nbWords = 12, $variableNbWords=true),
        'body' => $faker->text($maxNbChars = 3000),
        'status' => 1,
    ];
});
