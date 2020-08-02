<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     */
    public function run(): void
    {
        $this->call(ChaptersTableSeeder::class);
        $this->call(ExercisesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
