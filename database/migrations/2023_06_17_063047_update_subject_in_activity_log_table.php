<?php

use App\Models\Activity;
use App\Models\Comment;
use App\Services\ActivityService;
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
        $activities = Activity::where('description', ActivityService::COMMENTED)->get();

        foreach ($activities as $activity) {
            $activity->subject_type = Comment::class;
            $activity->subject_id = $activity->properties['comment']['id'];
            $activity->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $activities = Activity::where('description', ActivityService::COMMENTED)->get();

        foreach ($activities as $activity) {
            $activity->subject_type = $activity->properties['comment']['commentable_type'];
            $activity->subject_id = $activity->properties['comment']['commentable_id'];
            $activity->save();
        }
    }
};
