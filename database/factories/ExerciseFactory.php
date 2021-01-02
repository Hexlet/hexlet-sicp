<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Chapter;
use App\Models\Exercise;
use Faker\Generator as Faker;

$factory->define(Exercise::class, function (Faker $faker) {
    return [
        'path' => $faker->numerify('#.#.#'),
        'chapter_id' => factory(Chapter::class)->create()->id,
    ];
});
