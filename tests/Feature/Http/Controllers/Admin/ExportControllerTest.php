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
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $response = $this->post(route('admin.export.store'), [
            'type' => 'users',
        ]);

        $response->assertStatus(200);
        $response->assertHeader('content-disposition');

        $filePath = storage_path('app/export/users.csv');

        $this->assertFileExists($filePath);

        $content = file_get_contents($filePath);
        $this->assertStringContainsString('John Doe', $content);
        $this->assertStringContainsString('john@example.com', $content);
        $this->assertStringContainsString((string) $user->id, $content);
    }

    public function testExportInvalidTypeThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->post(route('admin.export'), [
            'type' => 'invalid_type',
        ]);
    }
}
