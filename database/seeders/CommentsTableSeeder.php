<?php

namespace Database\Seeders;

use App\Models\Chapter;
use App\Models\Comment;
use App\Models\Exercise;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::limit(7)->get();
        $chapters = Chapter::get();
        $exercises = Exercise::get();

        $users->shuffle()->each(function (User $user) use ($chapters, $exercises) {
            Comment::factory()
                ->user($user)
                ->commentable($chapters->random())
                ->create();

            Comment::factory()
                ->user($user)
                ->commentable($exercises->random())
                ->create();
        });
    }
}
