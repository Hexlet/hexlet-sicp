<?php

namespace App\Services\Github;

use App\Models\Exercise;

class GithubExercisePathMapper
{
    public function toFilePath(Exercise $exercise): string
    {
        $chapterNum = $this->getChapterNumber($exercise);
        $exerciseName = str_replace('.', '-', $exercise->path);

        return "chapter-{$chapterNum}/exercise-{$exerciseName}/solution.rkt";
    }

    public function fromFilePath(string $filePath): ?string
    {
        if (!preg_match('#^chapter-(\d+)/exercise-([0-9]+(?:-[0-9]+)*)/solution\.rkt$#', $filePath, $matches)) {
            return null;
        }

        return str_replace('-', '.', $matches[2]);
    }

    private function getChapterNumber(Exercise $exercise): int
    {
        return (int) explode('.', $exercise->path)[0];
    }
}
