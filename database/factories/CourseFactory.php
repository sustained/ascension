<?php

use Faker\Generator as Faker;

$factory->define(\App\Course::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(6),
        'author_id' => 1
    ];
});
