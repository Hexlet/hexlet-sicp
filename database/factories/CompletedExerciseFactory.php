<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CompletedExercise;
use App\Chapter;
use App\User;

$factory->define(CompletedExercise::class, function () {
    return [
        'exercise_id' => factory(Chapter::class)->create()->id,
        'user_id'     => factory(User::class)->create()->id,
    ];
});
