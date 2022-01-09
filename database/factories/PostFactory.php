<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        //
        'user_id' => $faker->numberBetween($min = 1, $max = 23),
        'posts' => $faker->realtext(100),
    ];
});
