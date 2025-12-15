<?php

namespace Tests\Feature\Controllers\Admin;

use App\Models\User;
use App\Services\AnalyticsExporter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExportControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testExportUsersCsv(): void
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $this->app->instance(AnalyticsExporter::class, new AnalyticsExporter());

        $response = $this->post(route('admin.export'), [
            'type' => 'users',
        ]);

        $response->assertStatus(200);

        $exportsPath = storage_path('app/exports');
        $folders = glob($exportsPath . '/*', GLOB_ONLYDIR);
        rsort($folders);
        $latestFolder = $folders[0];

        $filePath = $latestFolder . '/users.csv';

        $this->assertFileExists($filePath);

        $content = file_get_contents($filePath);
        $this->assertStringContainsString('"John Doe"', $content);
        $this->assertStringContainsString('"john@example.com"', $content);
        $this->assertStringContainsString((string)$user->id, $content);

        unlink($filePath);
        rmdir($latestFolder);
    }

    public function testExportInvalidTypeThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->post(route('admin.export'), [
            'type' => 'invalid_type',
        ]);
    }
}
