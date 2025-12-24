<?php

namespace App\Services;

use App\Models\Chapter;
use App\Models\Comment;
use App\Models\Exercise;
use App\Models\Solution;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use League\Csv\Writer;
use Spatie\Activitylog\Models\Activity;

class AnalyticsExporter
{
    public function export(string $type): string
    {
        return match ($type) {
            'users'     => $this->exportUsers("export/users.csv"),
            'chapters'  => $this->exportChapters("export/chapters.csv"),
            'exercises' => $this->exportExercises("export/exercises.csv"),
            'solutions' => $this->exportSolutions("export/solutions.csv"),
            'comments'  => $this->exportComments("export/comments.csv"),
            'activity'  => $this->exportActivityLog("export/activity.csv"),
            default     => throw new \InvalidArgumentException("Unknown export type: {$type}"),
        };
    }

    private function exportUsers(string $path): string
    {
        $data = User::select(['id', 'points', 'created_at'])
            ->get();

        return $this->writeCsv($data, $path);
    }

    private function exportChapters(string $path): string
    {
        $data = Chapter::select(['id', 'path', 'parent_id', 'created_at'])
            ->get();

        return $this->writeCsv($data, $path);
    }

    private function exportExercises(string $path): string
    {
        $data = Exercise::select(['id', 'chapter_id', 'path', 'created_at'])
            ->get();

        return $this->writeCsv($data, $path);
    }

    private function exportSolutions(string $path): string
    {
        $data = Solution::select(['id', 'exercise_id', 'user_id', 'created_at'])
            ->get();

        return $this->writeCsv($data, $path);
    }

    private function exportComments(string $path): string
    {
        $data = Comment::select(['id', 'user_id', 'commentable_type', 'commentable_id', 'parent_id', 'created_at'])
            ->get();

        return $this->writeCsv($data, $path);
    }

    private function exportActivityLog(string $path): string
    {
        $data = Activity::select(['id', 'log_name', 'subject_id', 'subject_type', 'causer_id', 'event', 'created_at'])
            ->get();

        return $this->writeCsv($data, $path);
    }

    private function writeCsv(Collection $collection, string $path): string
    {
        $disk = Storage::disk();
        $directory = dirname($path);

        if (!$disk->exists($directory)) {
            $disk->makeDirectory($directory);
        }

        $csv = Writer::createFromPath(
            $disk->path($path),
            'w+'
        );

        if ($collection->isEmpty()) {
            return $disk->path($path);
        }

        $rows = $collection->map(
            static fn ($model) => $model->getAttributes()
        )->toArray();

        $csv->insertOne(array_keys($rows[0]));
        $csv->insertAll($rows);

        return $disk->path($path);
    }
}
