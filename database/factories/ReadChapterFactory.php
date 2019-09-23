<?php

/** @var Factory $factory */

use App\Chapter;
use App\ReadChapter;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(ReadChapter::class, function (Faker $faker) {
    return [
        'chapter_id' => factory(Chapter::class)->create()->id,
    ];
});
