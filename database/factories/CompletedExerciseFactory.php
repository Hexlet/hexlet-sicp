<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CompletedExercise;
use App\Exercise;
use App\User;

$factory->define(CompletedExercise::class, function () {
    return [
        'exercise_id' => factory(Exercise::class)->create()->id,
        'user_id'     => factory(User::class)->create()->id,
    ];
});
