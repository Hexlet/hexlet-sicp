<?php

namespace Tests\Feature\Services;

use App\Services\AnalyticsExporter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class AnalyticsExporterTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake();
    }

    #[DataProvider('exportTypesProvider')]
    public function testExportCreatesCsvFileUsingSeed(string $type, string $path): void
    {
        $this->seed();

        $service = new AnalyticsExporter();
        $service->export($type);

        Storage::assertExists($path);

        $content = Storage::get($path);

        $this->assertNotEmpty($content, "CSV {$type} null");

        $lines = explode("\n", trim($content));
        $this->assertNotEmpty($lines, "CSV {$type} null");

        $headers = str_getcsv($lines[0]);
        $this->assertNotEmpty($headers, "CSV {$type} null");
    }

    public static function exportTypesProvider(): array
    {
        return [
            'users'     => ['users', 'export/users.csv'],
            'chapters'  => ['chapters', 'export/chapters.csv'],
            'exercises' => ['exercises', 'export/exercises.csv'],
            'solutions' => ['solutions', 'export/solutions.csv'],
            'comments'  => ['comments', 'export/comments.csv'],
            'activity'  => ['activity', 'export/activity.csv'],
        ];
    }
}
