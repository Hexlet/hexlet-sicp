<?php

namespace Database\Factories;

use App\Models\Exercise;
use App\Models\Chapter;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExerciseFactory extends Factory
{
    protected $model = Exercise::class;

    public function definition(): array
    {
        return [
            'chapter_id' => Chapter::factory(),
            'path' => $this->faker->word,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
