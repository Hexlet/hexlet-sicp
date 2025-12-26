<?php

namespace Tests\Feature\Controllers\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ExportControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testExportUsersCsv(): void
    {
        Storage::disk('local')->deleteDirectory('export');

        $user = User::factory()->create([
            'points' => 120,
        ]);

        $response = $this->post(route('admin.export.store'), [
            'type' => 'users',
        ]);

        $response->assertStatus(200);
        $response->assertHeader('content-disposition');

        $filePath = storage_path('app/export/users.csv');
        $this->assertFileExists($filePath);

        $content = file_get_contents($filePath);
        $lines = explode("\n", trim($content));

        $this->assertEquals(
            ['id', 'points', 'created_at'],
            str_getcsv($lines[0])
        );

        $row = str_getcsv($lines[1]);

        $this->assertEquals($user->id, (int) $row[0]);
        $this->assertEquals($user->points, (int) $row[1]);
        $this->assertNotEmpty($row[2]);
    }

    public function testExportInvalidTypeThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->post(route('admin.export.store'), [
            'type' => 'invalid_type',
        ]);
    }
}
