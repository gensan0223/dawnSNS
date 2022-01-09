<?php

use Faker\Generator as Faker;

$factory->define(App\Follow::class, function (Faker $faker) {
    return [
        //
        // 'follow_id'=>$faker->unique()->randomNumber(2),
        // 'follower_id'=>$faker->unique()->randomNumber(2),

        'follow_id'=>$faker->numberBetween($min = 1, $max = 23),
        'follower_id'=>$faker->numberBetween($min = 1, $max = 23),
    ];
});
