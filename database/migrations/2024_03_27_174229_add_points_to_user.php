<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->addColumn('integer', 'points')->default(0);
        });
        DB::statement("UPDATE users SET points = ((SELECT count(user_id) FROM exercise_members em WHERE em.user_id = users.id) * 3);");
        DB::statement("UPDATE users SET points = points + (SELECT count(user_id) FROM chapter_members em WHERE em.user_id = users.id);");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('points');
        });
    }
};
