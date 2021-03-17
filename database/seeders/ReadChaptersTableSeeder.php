<?php

namespace Database\Seeders;

use App\Models\Chapter;
use App\Models\ReadChapter;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReadChaptersTableSeeder extends Seeder
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
            ReadChapter::factory()
                ->user($user)
                ->chapter($chapters->random())
                ->create();
        });
    }
}
