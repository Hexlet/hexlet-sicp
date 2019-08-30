<?php

use Faker\Generator as Faker;
use App\BookNode;
use App\Constants;

$factory->define(BookNode::class, function (Faker $faker) {
    return [
        'description' => $faker->text(200),
        'type' => Constants::BOOK_TYPES['chapter']
    ];
});
