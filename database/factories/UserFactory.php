<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<User> */
class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => implode(' ', [$this->faker->firstName, $this->faker->lastName]),
            'email' => $this->faker->safeEmail,
            'email_verified_at' => now(),
            'github_name' => $this->faker->userName,
            'hexlet_nickname' => $this->faker->userName,
            // password
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => str_random(10),
        ];
    }
}
