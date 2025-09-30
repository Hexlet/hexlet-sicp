<?php

namespace Database\Seeders;

use App\Models\Chapter;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */
    public function run(): void
    {
        User::factory()->count(9)->create();
        User::factory()->count(1)->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'is_admin' => true,
        ]);
    }
}
