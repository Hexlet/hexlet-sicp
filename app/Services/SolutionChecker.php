<?php

namespace App\Services;

use App\Helpers\ExerciseHelper;
use App\Models\Exercise;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use mikehaertl\shellcommand\Command;

class SolutionChecker
{
    public function check(User $user, Exercise $exercise, string $solutionCode): CheckResult
    {
        $tests = ExerciseHelper::getExerciseTests($exercise);
        $contents = view('exercise.solution_sandbox_wrapper',
            [
                'solution' => $this->prettifyCode($solutionCode),
                'tests' => $this->prettifyCode($tests),
            ])->render();


        $hashedUserExerciseSolutionId = hash('sha256', implode('', [$user->id, $exercise->id]));
        $userSolutionPath = sprintf('solutions/%s.rkt', $hashedUserExerciseSolutionId);

        Storage::put($userSolutionPath, $contents);
        $solutionPath = Storage::path($userSolutionPath);

        $command = new Command("raco test --check-stderr --quiet {$solutionPath}");

        $command->execute();

        $exitCode = $command->getExitCode();
        $output = $command->getExecuted()
            ? $command->getOutput()
            : $command->getError();

        return new CheckResult($exitCode, $output);
    }

    private function prettifyCode(string $code): string
    {
        $indent = str_repeat(' ', 28);
        $lines = explode("\n", $code);
        $indentedLines = array_map(fn($line) => "{$indent}$line", $lines);

        return implode("\n", $indentedLines);
    }
}
