<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("UPDATE users SET points = 0");
        DB::statement("UPDATE users SET points = ((SELECT count(user_id) FROM exercise_members em WHERE em.user_id = users.id AND state = 'finished') * 3);");
        DB::statement("UPDATE users SET points = points + (SELECT count(user_id) FROM chapter_members em WHERE em.user_id = users.id AND state = 'finished');");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
