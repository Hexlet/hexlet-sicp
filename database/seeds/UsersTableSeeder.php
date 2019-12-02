<?php

use App\Chapter;
use App\ReadChapter;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chapters = Chapter::all();
        factory(User::class, 10)->create()->each(function (User $user) use ($chapters) {
            $user->chapters()->attach(
                $chapters ->random(rand(5, 10))
            );
        });
    }
}
