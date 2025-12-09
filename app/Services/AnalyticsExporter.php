<?php

namespace App\Services;

use App\Models\Chapter;
use App\Models\Comment;
use App\Models\Exercise;
use App\Models\Solution;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Models\Activity;

class AnalyticsExporter
{
    public function export(string $directory): void
    {
        Storage::makeDirectory($directory);

        $this->exportUsers("{$directory}/users.csv");
        $this->exportChapters("{$directory}/chapters.csv");
        $this->exportExercises("{$directory}/exercises.csv");
        $this->exportSolutions("{$directory}/solutions.csv");
        $this->exportComments("{$directory}/comments.csv");
        $this->exportActivityLog("{$directory}/activity_log.csv");
    }

    private function exportUsers(string $path): void
    {
        $data = User::withTrashed()
            ->select(['id', 'name', 'email', 'github_name', 'hexlet_nickname', 'points', 'created_at'])
            ->get();

        $this->writeCsv($data, $path);
    }

    private function exportChapters(string $path): void
    {
        $data = Chapter::withTrashed()
            ->select(['id', 'path', 'parent_id', 'created_at'])
            ->get();

        $this->writeCsv($data, $path);
    }

    private function exportExercises(string $path): void
    {
        $data = Exercise::withTrashed()
            ->select(['id', 'chapter_id', 'path', 'created_at'])
            ->get();

        $this->writeCsv($data, $path);
    }

    private function exportSolutions(string $path): void
    {
        $data = Solution::withTrashed()
            ->select(['id', 'exercise_id', 'user_id', 'created_at'])
            ->get();

        $this->writeCsv($data, $path);
    }

    private function exportComments(string $path): void
    {
        $data = Comment::withTrashed()
            ->select(['id', 'user_id', 'commentable_type', 'commentable_id', 'parent_id', 'created_at'])
            ->get();

        $this->writeCsv($data, $path);
    }

    private function exportActivityLog(string $path): void
    {
        $data = Activity::withTrashed()
            ->select(['id', 'log_name', 'subject_id', 'subject_type', 'causer_id', 'event', 'created_at'])
            ->get();

        $this->writeCsv($data, $path);
    }

    private function writeCsv(Collection $collection, string $path): void
    {
        if ($collection->isEmpty()) {
            Storage::put($path, '');
            return;
        }

        $rows = [];

        $rows[] = implode(',', array_keys($collection->first()->getAttributes()));

        foreach ($collection as $item) {
            $quoted = array_map(
                static fn ($value): string => '"' . str_replace('"', '""', (string) $value) . '"',
                $item->getAttributes()
            );

            $rows[] = implode(',', $quoted);
        }

        Storage::put($path, implode("\n", $rows) . "\n");
    }
}
