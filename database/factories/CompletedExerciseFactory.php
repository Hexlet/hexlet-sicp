<?php

namespace Database\Factories;

use App\Models\CompletedExercise;
use App\Models\Exercise;
use App\Models\User;
use App\Services\ActivityService;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<CompletedExercise> */
class CompletedExerciseFactory extends Factory
{
    protected $model = CompletedExercise::class;

    public function definition(): array
    {
        return [
            'user_id' => null,
            'exercise_id' => null,
        ];
    }

    public function user(User $user): self
    {
        return $this->state(fn() => [
            'user_id' => $user->id,
        ]);
    }

    public function exercise(Exercise $exercise): self
    {
        return $this->state(fn() => [
            'exercise_id' => $exercise->id,
        ]);
    }

    public function configure(): self
    {
        return $this->afterCreating(function (CompletedExercise $completedExercise) {
            /** @var ActivityService $service */
            $service = app()->make(ActivityService::class);
            $service->logCompletedExercise(
                $completedExercise->user,
                $completedExercise->exercise
            );
        });
    }
}
