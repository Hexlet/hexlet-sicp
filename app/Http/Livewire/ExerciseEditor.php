<?php

namespace App\Http\Livewire;

use App\Helpers\ExerciseHelper;
use App\Models\Exercise;
use App\Models\Solution;
use App\Models\User;
use App\Services\CheckResult;
use App\Services\ExerciseService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ExerciseEditor extends Component
{
    public Exercise $exercise;
    public User $user;
    public string $solutionCode = '';
    public string $tests;
    public string $checkOutput = '';

    public function check(ExerciseService $exerciseService): void
    {
        if (!ExerciseHelper::exerciseHasTests($this->exercise)) {
            $this->completeExercise();
            return;
        }

        $checkResult = $exerciseService->check($this->user, $this->exercise, $this->solutionCode);
        $this->checkOutput = $checkResult->getOutput();

        if ($checkResult->isSuccess()) {
            $this->completeExercise();
        } else {
            flash()->warning(__('exercise.show.editor.message.failed'));
        }
    }

    public function save(ExerciseService $exerciseService): void
    {
        if (empty($this->solutionCode)) {
            flash()->warning(__('exercise.show.editor.message.empty_solution'));

            return;
        }

        $solution = $exerciseService->createSolution($this->user, $this->exercise, $this->solutionCode);

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

    private function completeExercise(): void
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
    }

    private function failEmptySolution(): void
    {
        flash()->warning(__('exercise.show.editor.message.empty_solution'));
    }
}
