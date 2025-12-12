<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\Activitylog\Models\Activity;

class ActivityFactory extends Factory
{
    protected $model = Activity::class;

    public function definition(): array
    {
        return [
            'log_name' => 'default',
            'description' => $this->faker->sentence,
            'subject_id' => null,
            'subject_type' => null,
            'causer_id' => null,
            'causer_type' => null,
            'properties' => json_encode(['ip' => $this->faker->ipv4]),
            'event' => null,
            'batch_uuid' => null,
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}
