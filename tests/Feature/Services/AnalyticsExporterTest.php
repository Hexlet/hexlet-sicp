<?php

namespace Tests\Feature\Services;

use Tests\TestCase;
use App\Services\AnalyticsExporter;
use App\Models\User;
use App\Models\Chapter;
use App\Models\Exercise;
use App\Models\Solution;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Models\Activity;

class AnalyticsExporterTest extends TestCase
{
    protected string $directory = 'analytics-test';

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake();
    }
    public function testExportCreatesDirectoryAndFiles(): void
    {
        User::factory()->create();
        Chapter::factory()->create();
        Exercise::factory()->create();
        Solution::factory()->create();
        Comment::factory()->create();
        Activity::factory()->create();

        $service = new AnalyticsExporter();
        $service->export($this->directory);

        Storage::assertExists("{$this->directory}/users.csv");

        $files = [
            'users.csv',
            'chapters.csv',
            'exercises.csv',
            'solutions.csv',
            'comments.csv',
            'activity_log.csv',
        ];

        foreach ($files as $file) {
            Storage::assertExists("{$this->directory}/{$file}");
        }
    }

    public function testUsersCsvContainsCorrectHeadersAndRow(): void
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ]);

        $service = new AnalyticsExporter();
        $service->export($this->directory);

        $content = Storage::disk('local')->get("{$this->directory}/users.csv");
        $lines = explode("\n", trim($content));

        $expectedHeader = 'id,name,email,github_name,hexlet_nickname,points,created_at';
        $this->assertEquals($expectedHeader, $lines[0]);

        $this->assertStringContainsString('"'.$user->id.'"', $lines[1]);
        $this->assertStringContainsString('"John Doe"', $lines[1]);
        $this->assertStringContainsString('"john@example.com"', $lines[1]);
    }

    public function testEmptyTablesProduceEmptyCsv(): void
    {
        $service = new AnalyticsExporter();
        $service->export($this->directory);

        $content = Storage::disk('local')->get("{$this->directory}/chapters.csv");

        $this->assertSame("", $content);
    }
}
