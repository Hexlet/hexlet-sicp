<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\CheckResultData;
use App\Models\User;
use App\Models\Exercise;
use App\Models\ExerciseMember;
use App\Models\Solution;
use App\Services\SolutionChecker;
use Illuminate\Support\Facades\Log;

class ExerciseService
{
    private const int POINTS_PER_EXERCISE = 3;

    public function __construct(private SolutionChecker $checker, private ActivityService $activityService)
    {
    }

    public function check(User $user, Exercise $exercise, string $solutionCode): CheckResultData
    {
        $checkResult = $this->checker->check($exercise, $solutionCode);

        if ($checkResult->isCheckExecutionError()) {
            Log::error(
                "Failed to execute check. Output: {$checkResult->getOutput()}"
            );

            return $checkResult;
        }

        if ($user->isGuest()) {
            return $checkResult;
        }

        /** @var \App\Models\ExerciseMember $exerciseMember */
        $exerciseMember = ExerciseMember
            ::whereBelongsTo($user)
            ->whereBelongsTo($exercise)
            ->firstOrNew();

        $exerciseMember->user()->associate($user);
        $exerciseMember->exercise()->associate($exercise);
        $exerciseMember->save();

        if ($checkResult->isSuccess() && $user->isRegistered()) {
            if ($exerciseMember->mayFinish()) {
                $exerciseMember->finish();
                $user->increment('points', self::POINTS_PER_EXERCISE);
                $exerciseMember->save();

                $this->activityService->logCompletedExercise($user, $exercise);
            }
        }

        return $checkResult;
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
