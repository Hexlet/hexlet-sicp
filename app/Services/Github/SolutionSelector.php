<?php

namespace App\Services\Github;

use App\Enums\SyncStatus;
use App\Models\Solution;
use App\Models\SolutionSyncLog;
use App\Models\User;
use Illuminate\Support\Collection;

class SolutionSelector
{
    public function getSolutionsForSync(User $user): Collection
    {
        $allSolutions = Solution::where('user_id', $user->id)
            ->latestPerExercise()
            ->whereHas('exercise')
            ->with('exercise')
            ->get();

        $solutionsWithTests = $allSolutions->filter(function ($solution) {
            return $solution->exercise->hasTests();
        });

        if ($solutionsWithTests->isEmpty()) {
            return collect();
        }

        $solutionIds = $solutionsWithTests->pluck('id')->toArray();

        $lastSyncs = SolutionSyncLog::where('github_repository_id', $user->githubRepository->id)
            ->whereIn('solution_id', $solutionIds)
            ->where('status', SyncStatus::Success)
            ->select('solution_id', 'created_at')
            ->get()
            ->groupBy('solution_id')
            ->map(fn($group) => $group->sortByDesc('created_at')->first());

        return $solutionsWithTests->filter(function ($solution) use ($lastSyncs) {
            $lastSync = $lastSyncs->get($solution->id);

            if (!$lastSync) {
                return true;
            }

            return $solution->updated_at > $lastSync->created_at;
        });
    }
}
