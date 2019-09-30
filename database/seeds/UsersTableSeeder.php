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
        factory(User::class, 10)->create()->each(function (User $user) {
            $chapters = Chapter::inRandomOrder()->limit(rand(5, 10))->get();
            $user->chapters()->attach($chapters);
        });
    }
}
