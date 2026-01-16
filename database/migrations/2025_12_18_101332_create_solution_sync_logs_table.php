<?php

use App\Enums\SyncStatus;
use App\Enums\SyncType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('solution_sync_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('github_repository_id')->constrained()->onDelete('cascade');
            $table->foreignId('solution_id')->nullable()->constrained()->onDelete('set null');
            $table->string('sync_type');
            $table->string('commit_sha')->nullable();
            $table->string('file_path');
            $table->string('status');
            $table->text('error_message')->nullable();
            $table->timestamps();

            $table->index(['github_repository_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solution_sync_logs');
    }
};
