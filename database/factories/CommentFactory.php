<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;
use App\User;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->text,
    ];
});

$factory->state(Comment::class, 'with_user', function () {
    return [
        'user_id' => factory(User::class),
    ];
});
