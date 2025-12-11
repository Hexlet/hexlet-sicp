<?php

namespace Database\Factories;

use App\Models\Chapter;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChapterFactory extends Factory
{
    protected $model = Chapter::class;

    public function definition(): array
    {
        return [
            'path' => $this->faker->word,
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
