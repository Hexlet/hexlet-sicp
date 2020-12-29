<?php

namespace Database\Seeders;

use App\Chapter;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */
    public function run(): void
    {
        $chapters = Chapter::all();
        factory(User::class, 10)->create()->each(function (User $user) use ($chapters): void {
            $user->chapters()->attach(
                $chapters ->random(rand(5, 10))
            );
        });
    }
}
