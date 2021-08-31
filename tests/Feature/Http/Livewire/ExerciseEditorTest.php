<?php

namespace Tests\Feature\Http\Livewire;

use App\Http\Livewire\ExerciseEditor;
use App\Models\Exercise;
use App\Models\User;
use Database\Seeders\ChaptersTableSeeder;
use Database\Seeders\ExercisesTableSeeder;
use Livewire;
use Tests\TestCase;

class ExerciseEditorTest extends TestCase
{
    private User $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed([
            ChaptersTableSeeder::class,
            ExercisesTableSeeder::class,
        ]);
        /** @var User $user */
        $user = User::factory()->create();
        $this->user = $user;
        $this->actingAs($this->user);
    }

    public function testCheckExerciseWithoutTests(): void
    {
        $exercise = Exercise::wherePath('1.1')->firstOrFail();
        Livewire::test(ExerciseEditor::class, ['exercise' => $exercise, 'user' => $this->user])
            ->assertSee(__('exercise.show.editor.message.has_not_tests'))
            ->call('check')
            ->assertSeeHtml(__('exercise.show.editor.message.success'))
            ->assertStatus(200);
    }

    public function testCheckEmptySolution(): void
    {
        $exercise = Exercise::wherePath('1.3')->firstOrFail();
        Livewire::test(ExerciseEditor::class, ['exercise' => $exercise, 'user' => $this->user])
            ->assertDontSeeHtml('alert')
            ->call('check')
            ->assertSeeHtml(__('exercise.show.editor.message.failed'))
            ->assertStatus(200);
    }

    public function testCheckSuccess(): void
    {
        $exercise = Exercise::wherePath('1.3')->firstOrFail();
        $underscoredPath = $exercise->present()->underscorePath;
        $solutionCode = view("exercise.solution_stub.{$underscoredPath}_solution")->render();
        Livewire::test(ExerciseEditor::class, ['exercise' => $exercise, 'user' => $this->user])
            ->assertDontSeeHtml('alert')
            ->set('solutionCode', $solutionCode)
            ->call('check')
            ->assertSeeHtml(__('exercise.show.editor.message.success'))
            ->assertStatus(200);
    }
}
