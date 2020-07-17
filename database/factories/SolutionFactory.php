<?php

use App\Solution;
use App\Exercise;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Solution::class, function (Faker $faker) {
    return [
        'exercise_id' => factory(Exercise::class)->create()->id,
        'content' => $faker->text,
    ];
});
