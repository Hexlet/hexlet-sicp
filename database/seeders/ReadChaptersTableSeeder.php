<?php

namespace Database\Seeders;

use App\Models\Chapter;
use App\Models\ChapterMember;
use App\Models\User;
use Illuminate\Database\Seeder;

class ChapterMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::limit(5)->get();
        $chapters = Chapter::get();

        $users->each(function (User $user) use ($chapters) {
            ChapterMember::factory()
                ->user($user)
                ->chapter($chapters->random())
                ->create();
        });
    }
}
