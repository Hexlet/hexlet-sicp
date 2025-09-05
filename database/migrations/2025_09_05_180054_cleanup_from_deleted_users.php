<?php

use App\Models\Activity;
use App\Models\ChapterMember;
use Illuminate\Database\Migrations\Migration;
use App\Models\Comment;
use App\Models\ExerciseMember;
use App\Models\Solution;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Comment::whereDoesntHave('user')->delete();
        ExerciseMember::whereDoesntHave('user')->delete();
        ChapterMember::whereDoesntHave('user')->delete();
        Solution::whereDoesntHave('user')->delete();
        Activity::whereDoesntHave('causer')->delete();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Comment::withTrashed()->whereDoesntHave('user')->restore();
        ExerciseMember::withTrashed()->whereDoesntHave('user')->restore();
        ChapterMember::withTrashed()->whereDoesntHave('user')->restore();
        Solution::withTrashed()->whereDoesntHave('user')->restore();
    }
};
