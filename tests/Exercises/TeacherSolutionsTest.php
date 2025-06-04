<?php

namespace Tests\Exercises;

use Tests\TestCase;
use App\Services\SolutionChecker;
use App\Models\Exercise;
use App\Models\User;
use Database\Seeders\ChaptersTableSeeder;
use Database\Seeders\ExercisesTableSeeder;
use Illuminate\Support\Collection;
use PHPUnit\Framework\Attributes\DataProvider;
use Symfony\Component\Yaml\Yaml;

class TeacherSolutionsTest extends TestCase
{
    protected User $user;
    protected Collection $exercises;
    protected SolutionChecker $solutionChecker;

    protected function setUp(): void
    {
        parent::setUp();

        // FIXME: setup database only once
        $this->seed(ChaptersTableSeeder::class);
        $this->seed(ExercisesTableSeeder::class);

        $this->solutionChecker = new SolutionChecker();

        $this->exercises = Exercise::all()
            ->filter(fn(Exercise $exercise) => $exercise->hasTeacherSolution())
            ->keyBy('path');
    }

    public static function exercisesPathsProvider(): array
    {
        $fixturePath = implode('/', [__DIR__, '..', '..', 'database', 'exercises.yml']);
        $exercisesByChapters =  collect(Yaml::parseFile($fixturePath));

        $exercisesPaths = $exercisesByChapters
            ->pluck('children')
            ->flatten()
            ->map(fn($path) => [$path])
            ->toArray();

        return $exercisesPaths;
    }

    #[DataProvider('exercisesPathsProvider')]
    public function testTeacherSolutions(string $exercisePath): void
    {
        /** @var Exercise $exercise */
        $exercise = $this->exercises->get($exercisePath);

        $millerRabinExercisePath = '1.28';
        if ($exercisePath === $millerRabinExercisePath) {
            $this->markTestSkipped('The Miller Rabin test is probabilistic and its result is non-deterministic');
        }

        if (!$this->exercises->has($exercisePath)) {
            $this->markTestSkipped("Exercise {$exercisePath} doesnt have teacher solution");
            return;
        }

        $teacherSolution = $exercise->getExerciseTeacherSolution();
        $checkResult = $this->solutionChecker->check($exercise, $teacherSolution);

        $output = $checkResult->getOutput();
        $this->assertTrue(
            $checkResult->isSuccess(),
            "Exercise \"{$exercisePath}\" has errors in solution:\n{$output}"
        );
    }
}
