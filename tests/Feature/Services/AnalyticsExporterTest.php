<?php

namespace Tests\Feature\Services;

use App\Models\Chapter;
use App\Models\Comment;
use App\Models\Exercise;
use App\Models\Solution;
use App\Models\User;
use App\Services\AnalyticsExporter;
use Database\Factories\ActivityFactory;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AnalyticsExporterTest extends TestCase
{
    protected string $directory = 'analytics-test';

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake();
    }

    public function testExportEachTypeCreatesCsvFile(): void
    {
        $user = User::factory()->create();
        $chapter = Chapter::factory()->create();
        $exercise = Exercise::factory()->create(['chapter_id' => $chapter->id]);
        $solution = Solution::factory()->create([
            'exercise_id' => $exercise->id,
            'user_id' => $user->id,
        ]);

        Comment::factory()->create([
            'user_id' => $user->id,
            'commentable_id' => $solution->id,
            'commentable_type' => Solution::class,
        ]);

        ActivityFactory::new()->create();

        $service = new AnalyticsExporter();

        $types = [
            'users' => 'users.csv',
            'chapters' => 'chapters.csv',
            'exercises' => 'exercises.csv',
            'solutions' => 'solutions.csv',
            'comments' => 'comments.csv',
            'activity' => 'activity_log.csv',
        ];

        foreach ($types as $type => $file) {
            $service->export($this->directory, $type);
            Storage::assertExists("{$this->directory}/{$file}");
        }
    }

    public function testUsersCsvContainsCorrectHeadersAndRow(): void
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $service = new AnalyticsExporter();
        $service->export($this->directory, 'users');

        $content = Storage::disk('local')->get("{$this->directory}/users.csv");
        $lines = explode("\n", trim($content));

        $expectedHeader = ['id','name','email','email_verified_at','github_name','points','created_at','is_admin'];
        $actualHeader = str_getcsv($lines[0]);

        $this->assertEquals($expectedHeader, $actualHeader);
        $this->assertStringContainsString("\"{$user->id}\"", $lines[1]);
        $this->assertStringContainsString('"John Doe"', $lines[1]);
        $this->assertStringContainsString('"john@example.com"', $lines[1]);
    }

    public function testEmptyTablesProduceEmptyCsv(): void
    {
        $service = new AnalyticsExporter();

        $service->export($this->directory, 'chapters');

        $content = Storage::disk('local')->get("{$this->directory}/chapters.csv");
        $this->assertSame("", $content);
    }
}
