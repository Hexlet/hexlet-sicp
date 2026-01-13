<?php

namespace App\Services\Github;

use App\Models\Exercise;
use App\Models\Solution;
use Illuminate\Support\Facades\File;

class RepositoryTemplateGenerator
{
    private const string TEMPLATES_PATH = 'templates/github';

    private const array TEMPLATE_PATHS = [
        'readme' => 'README.md',
        'gitignore' => '.gitignore',
        'workflow' => '.github/workflows/test.yml',
        'test_script' => 'scripts/test-exercises.sh',
        'solution' => 'solution.rkt.template',
        'tests' => 'tests.rkt.template',
        'solution_wrapper' => 'solution-wrapper.rkt.template',
    ];

    public function generateReadme(): string
    {
        $template = File::get($this->getTemplatePath(self::TEMPLATE_PATHS['readme']));
        $totalExercises = Exercise::count();

        return str_replace(
            '{total_exercises}',
            $totalExercises,
            $template
        );
    }

    public function generateGitignore(): string
    {
        return File::get($this->getTemplatePath(self::TEMPLATE_PATHS['gitignore']));
    }

    public function generateGitHubActionsWorkflow(): string
    {
        return File::get($this->getTemplatePath(self::TEMPLATE_PATHS['workflow']));
    }

    public function generateTestScript(): string
    {
        return File::get($this->getTemplatePath(self::TEMPLATE_PATHS['test_script']));
    }

    public function generateExerciseSolution(Exercise $exercise): string
    {
        $template = File::get($this->getTemplatePath(self::TEMPLATE_PATHS['solution']));
        $exerciseUrl = $this->getExerciseUrl($exercise);

        return str_replace(
            ['{exercise_path}', '{exercise_url}'],
            [$exercise->path, $exerciseUrl],
            $template
        );
    }

    public function generateExerciseTests(Exercise $exercise): string
    {
        $template = File::get($this->getTemplatePath(self::TEMPLATE_PATHS['tests']));
        $tests = $exercise->getExerciseTests();

        return str_replace(
            ['{exercise_path}', '{tests}'],
            [$exercise->path, $tests],
            $template
        );
    }

    public function wrapSolutionContent(Solution $solution): string
    {
        $template = File::get($this->getTemplatePath(self::TEMPLATE_PATHS['solution_wrapper']));
        $exercise = $solution->exercise;
        $exerciseUrl = $this->getExerciseUrl($exercise);
        $content = $solution->content;

        return str_replace(
            ['{exercise_path}', '{exercise_url}', '{content}'],
            [$exercise->path, $exerciseUrl, $content],
            $template
        );
    }

    public function getPlaceholderContent(): string
    {
        $template = File::get($this->getTemplatePath(self::TEMPLATE_PATHS['solution']));

        if (preg_match('/;;;?\s*BEGIN SOLUTION\s*\n(.*?)\n;;;?\s*END SOLUTION/s', $template, $matches)) {
            return trim($matches[1]);
        }

        return trim($template);
    }

    private function getTemplatePath(string $template): string
    {
        return resource_path(self::TEMPLATES_PATH . '/' . $template);
    }

    private function getExerciseUrl(Exercise $exercise): string
    {
        return "https://sicp.hexlet.io/exercises/{$exercise->path}";
    }
}
