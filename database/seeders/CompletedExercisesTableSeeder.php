<?php

namespace Database\Seeders;

use App\Models\CompletedExercise;
use App\Models\Exercise;
use App\Models\User;
use Illuminate\Database\Seeder;

class CompletedExercisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::limit(3)->get();
        $exercises = Exercise::get();

        $users->each(function (User $user) use ($exercises) {
            CompletedExercise::factory()
                ->user($user)
                ->exercise($exercises->random())
                ->create();
        });
    }
}
