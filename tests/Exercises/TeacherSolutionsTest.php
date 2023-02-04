<?php

namespace Tests\Exercises;

use Tests\TestCase;
use App\Services\SolutionChecker;
use App\Models\Exercise;
use App\Models\User;
use Database\Seeders\ChaptersTableSeeder;
use Database\Seeders\ExercisesTableSeeder;
use Illuminate\Support\Collection;
use Symfony\Component\Yaml\Yaml;

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

        $this->solutionChecker = new SolutionChecker();
    }

    public function dataProvider(): array
    {
        $fixturePath = implode('/', [__DIR__, '..', '..', 'database', 'exercises.yml']);
        $exercisesByChapters =  collect(Yaml::parseFile($fixturePath));

        return $exercisesByChapters
            ->pluck('children')
            ->flatten()
            ->map(fn($path) => [$path])
            ->toArray();
    }

    /**
     * @dataProvider dataProvider
     */
    public function testTeacherSolutions(string $exercisePath): void
    {
        $millerRabinExercisePath = '1.28';
        if ($exercisePath === $millerRabinExercisePath) {
            $this->markTestSkipped('The Miller Rabin test is probabilistic and its result is non-deterministic');
        }

        $exercise = Exercise::wherePath($exercisePath)->firstOrFail();

        if (!$exercise->hasTeacherSolution()) {
            $this->markTestSkipped("Exercise {$exercisePath} doesnt have teacher solution");
        }
        $teacherSolution = $exercise->getExerciseTeacherSolution();
        $checkResult = $this->solutionChecker->check($exercise, $teacherSolution);

        $exercisePath = $exercise->path;
        $output = $checkResult->getOutput();
        $this->assertTrue(
            $checkResult->isSuccess(),
            "Exercise \"{$exercisePath}\" has errors in solution:\n{$output}"
        );
    }
}
