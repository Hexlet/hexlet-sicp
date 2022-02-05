<?php

declare(strict_types=1);

namespace App\Services;

use App\Helpers\ExerciseHelper;
use App\Models\User;
use App\Models\Exercise;
use App\Models\Solution;
use App\Services\SolutionChecker;
use Illuminate\Support\Facades\Log;

class ExerciseService
{
    public function __construct(private SolutionChecker $checker, private ActivityService $activityService)
    {
    }

    public function check(User $user, Exercise $exercise, string $solutionCode): CheckResult
    {
        if (!ExerciseHelper::exerciseHasTests($exercise)) {
            $this->completeExercise($user, $exercise);
            return new CheckResult(0, '');
        }

        $checkResult = $this->checker->check($user, $exercise, $solutionCode);

        if ($checkResult->isSuccess()) {
            $this->completeExercise($user, $exercise);
        }

        if ($checkResult->isCheckExecutionError()) {
            Log::error(
                "Failed to execute check. Output: {$checkResult->getOutput()}"
            );
        }

        return $checkResult;
    }

    public function completeExercise(User $user, Exercise $exercise): void
    {
        if ($user->hasCompletedExercise($exercise) || auth()->guest()) {
            return;
        }

        $user->exercises()->syncWithoutDetaching($exercise);
        $this->activityService->logCompletedExercise($user, $exercise);
    }

    // TODO: remove me
    public function removeCompletedExercise(User $user, Exercise $exercise): void
    {
        $user->exercises()->detach($exercise);
        $this->activityService->logRemovedExercise($user, $exercise);
    }

    public function createSolution(User $user, Exercise $exercise, string $solutionCode): Solution
    {
        $solution = new Solution(['content' => $solutionCode]);

        $solution = $solution->user()->associate($user);
        $solution = $solution->exercise()->associate($exercise);
        $solution->save();

        $this->activityService->logAddedSolution($user, $solution);

        return $solution;
    }
}
