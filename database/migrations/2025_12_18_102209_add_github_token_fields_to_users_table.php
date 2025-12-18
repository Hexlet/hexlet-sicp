<?php

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
        Schema::table('users', function (Blueprint $table) {
            $table->text('github_access_token')->nullable()->after('github_name');
            $table->text('github_refresh_token')->nullable()->after('github_access_token');
            $table->timestamp('github_token_expires_at')->nullable()->after('github_refresh_token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['github_access_token', 'github_refresh_token', 'github_token_expires_at']);
        });
    }
};
