<?php

namespace Tests\Feature\Services;

use App\Models\User;
use App\Services\AnalyticsExporter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AnalyticsExporterTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake();
    }

public function testExportEachTypeCreatesCsvFile(): void
{
    Storage::fake();

    $this->seed();

    $service = new AnalyticsExporter();

    $types = [
        'users'     => 'export/users.csv',
        'chapters'  => 'export/chapters.csv',
        'exercises' => 'export/exercises.csv',
        'solutions' => 'export/solutions.csv',
        'comments'  => 'export/comments.csv',
        'activity'  => 'export/activity.csv',
    ];

    foreach ($types as $type => $path) {
        $service->export($type);
        Storage::assertExists($path);
    }
}

    public function testUsersCsvContainsCorrectHeadersAndRow(): void
    {
        $user = User::factory()->create([
            'points' => 150,
        ]);

        $service = new AnalyticsExporter();
        $service->export('users');

        $content = Storage::get('export/users.csv');
        $lines = explode("\n", trim($content));

        $expectedHeader = [
            'id',
            'points',
            'created_at',
        ];

        $this->assertEquals($expectedHeader, str_getcsv($lines[0]));

        $row = str_getcsv($lines[1]);

        $this->assertEquals($user->id, (int) $row[0]);
        $this->assertEquals($user->points, (int) $row[1]);
        $this->assertNotEmpty($row[2]);
    }

    public function testEmptyTablesProduceEmptyCsv(): void
    {
        $service = new AnalyticsExporter();

        $service->export('chapters');

        $content = Storage::get('export/chapters.csv');
        $this->assertSame('', $content);
    }
}
