<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CompletedExercise;
use App\Models\Exercise;
use App\Models\User;

$factory->define(CompletedExercise::class, function () {
    return [
        'exercise_id' => factory(Exercise::class)->create()->id,
        'user_id'     => factory(User::class)->create()->id,
    ];
});
