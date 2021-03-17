<?php

namespace App\Http\Livewire;

use App\Helpers\ExerciseHelper;
use App\Models\Exercise;
use App\Models\Solution;
use App\Models\User;
use App\Services\ActivityService;
use App\Services\SolutionChecker;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ExerciseEditor extends Component
{
    public Exercise $exercise;
    public User $user;
    public string $solutionCode = '';
    public string $tests;
    public array $checkResult = [
        'exit_code' => null,
        'output' => null,
    ];

    public function check(SolutionChecker $checker, ActivityService $activityService): void
    {
        if (!ExerciseHelper::exerciseHasTests($this->exercise)) {
            $this->completeExercise($activityService);
            return;
        }

        $this->checkResult = $checker->check($this->user, $this->exercise, $this->solutionCode);

        if ($this->checkResult['exit_code'] === SolutionChecker::SUCCESS_EXIT_CODE) {
            $this->completeExercise($activityService);
        } else {
            $this->failExerciseCheck();
        }
    }

    public function save(ActivityService $activityService): void
    {
        $solution = new Solution(['content' => $this->solutionCode]);

        $solution = $solution->user()->associate($this->user);
        $solution = $solution->exercise()->associate($this->exercise);
        $solution->save();

        $activityService->logAddedSolution($this->user, $solution);

        $message = collect([
            __('layout.flash.success'),
            route('solutions.show', [$solution]),
        ])->implode(' ');
        flash()->success($message);
    }

    public function render(): View
    {
        return view('livewire.exercise-editor');
    }

    public function mount(Exercise $exercise, User $user): void
    {
        $this->exercise = $exercise;
        $this->user = $user;
        $this->tests = ExerciseHelper::exerciseHasTests($exercise)
            ? ExerciseHelper::getExerciseTests($exercise)
            : '';

        if (empty($this->tests)) {
            flash()->message(__('exercise.show.editor.message.has_not_tests'));
        }
    }

    private function completeExercise(ActivityService $activityService): void
    {
        if (auth()->guest()) {
            $message = collect([
                __('exercise.show.editor.message.success'),
                __('exercise.show.editor.auth.required'),
            ])->implode(' ');
            flash()->success($message);

            return;
        }

        flash()->success(__('exercise.show.editor.message.success'));

        if ($this->user->hasCompletedExercise($this->exercise)) {
            return;
        }

        $this->user->exercises()->syncWithoutDetaching($this->exercise);
        $activityService->logCompletedExercise($this->user, $this->exercise);
    }

    private function failExerciseCheck(): void
    {
        flash()->warning(__('exercise.show.editor.message.failed'));
    }
}
