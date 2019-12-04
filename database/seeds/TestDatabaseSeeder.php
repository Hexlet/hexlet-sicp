<?php

use Illuminate\Database\Seeder;

class TestDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TestChaptersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
