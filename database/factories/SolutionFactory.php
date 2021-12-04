<?php

namespace Database\Factories;

use App\Models\Exercise;
use App\Models\Solution;
use App\Models\User;
use App\Services\ActivityService;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Solution> */
class SolutionFactory extends Factory
{
    protected $model = Solution::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'exercise_id' => Exercise::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'content' => $this->faker->text,
        ];
    }

    public function configure(): self
    {
        return $this->afterCreating(function (Solution $solution) {
            /** @var ActivityService $activitySerivce */
            $activitySerivce = app()->make(ActivityService::class);
            $activitySerivce->logAddedSolution($solution->user, $solution);
        });
    }
}
