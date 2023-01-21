<?php

namespace Database\Seeders;

use App\Models\ExerciseMember;
use App\Models\Exercise;
use App\Models\User;
use Illuminate\Database\Seeder;

class ExerciseMembersTableSeeder extends Seeder
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
            ExerciseMember::factory()
                ->user($user)
                ->exercise($exercises->random())
                ->create();
        });
    }
}
