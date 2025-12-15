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
    public function export(string $directory, string $type): void
    {
        Storage::makeDirectory($directory);

        switch ($type) {
            case 'users':
                $this->exportUsers("{$directory}/users.csv");
                break;
            case 'chapters':
                $this->exportChapters("{$directory}/chapters.csv");
                break;
            case 'exercises':
                $this->exportExercises("{$directory}/exercises.csv");
                break;
            case 'solutions':
                $this->exportSolutions("{$directory}/solutions.csv");
                break;
            case 'comments':
                $this->exportComments("{$directory}/comments.csv");
                break;
            case 'activity':
                $this->exportActivityLog("{$directory}/activity.csv");
                break;
            default:
                throw new \InvalidArgumentException("Unknown export type: {$type}");
        }
    }

    private function exportUsers(string $path): void
    {
        $data = User::select(['id', 'name', 'email', 'email_verified_at', 'github_name', 'points', 'created_at', 'is_admin'])
            ->get();

        $this->writeCsv($data, $path);
    }

    private function exportChapters(string $path): void
    {
        $data = Chapter::select(['id', 'path', 'parent_id', 'created_at'])
            ->get();

        $this->writeCsv($data, $path);
    }

    private function exportExercises(string $path): void
    {
        $data = Exercise::select(['id', 'chapter_id', 'path', 'created_at'])
            ->get();

        $this->writeCsv($data, $path);
    }

    private function exportSolutions(string $path): void
    {
        $data = Solution::select(['id', 'exercise_id', 'user_id', 'created_at'])
            ->get();

        $this->writeCsv($data, $path);
    }

    private function exportComments(string $path): void
    {
        $data = Comment::select(['id', 'user_id', 'commentable_type', 'commentable_id', 'parent_id', 'created_at'])
            ->get();

        $this->writeCsv($data, $path);
    }

    private function exportActivityLog(string $path): void
    {
        $data = Activity::select(['id', 'log_name', 'subject_id', 'subject_type', 'causer_id', 'event', 'created_at'])
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
                static fn($value): string => '"' . str_replace('"', '""', (string) $value) . '"',
                $item->getAttributes()
            );

            $rows[] = implode(',', $quoted);
        }

        Storage::put($path, implode("\n", $rows) . "\n");
    }
}
