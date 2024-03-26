<?php

use App\Models\Activity;
use App\Services\ActivityService;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Activity::whereDescription(ActivityService::ACTIVITY_CHAPTER_ADDED)->update([
            'description' => ActivityService::ACTIVITY_MULTIPLE_CHAPTERS_ADDED,
        ]);
    }
};
