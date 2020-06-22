<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Solution;
use App\Exercise;
use Faker\Generator as Faker;

$factory->define(Solution::class, function (Faker $faker) {
    return [
        'exercise_id' => factory(Exercise::class)->create()->id,
        'content' => $faker->text,
    ];
});
