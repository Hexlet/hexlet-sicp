<?php

namespace Tests\Exercises;

use Tests\TestCase;
use App\Services\SolutionChecker;
use App\Models\Exercise;
use App\Models\User;
use Database\Seeders\ChaptersTableSeeder;
use Database\Seeders\ExercisesTableSeeder;
use Illuminate\Support\Collection;

class TeacherSolutionsTest extends TestCase
{
    protected User $user;
    protected Collection $exercises;
    protected SolutionChecker $solutionChecker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(ChaptersTableSeeder::class);
        $this->seed(ExercisesTableSeeder::class);

        /** @var User $user */
        $user = User::factory()->create();
        $this->user = $user;

        // NOTE: The Miller Rabin test is probabilistic and its result is non-deterministic
        $millerRabinExercisePath = '1.28';
        $this->exercises = Exercise::where('path', '!=', $millerRabinExercisePath)
            ->orderBy('id')
            ->get();

        $this->solutionChecker = new SolutionChecker();
    }

    public function testTeacherSolutions(): void
    {
        foreach ($this->exercises as $exercise) {
            if ($exercise->hasTeacherSolution()) {
                $teacherSolution = $exercise->getExerciseTeacherSolution();
                $checkResult = $this->solutionChecker->check($this->user, $exercise, $teacherSolution);

                $exerciseFullTitle = $exercise->getFullTitle();
                $output = $checkResult->getOutput();
                $this->assertTrue(
                    $checkResult->isSuccess(),
                    "Exercise \"{$exerciseFullTitle}\" has errors in solution:\n{$output}"
                );
            }
        }
    }
}
