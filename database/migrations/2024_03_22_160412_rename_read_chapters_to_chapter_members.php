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
        Schema::rename('read_chapters', 'chapter_members');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('chapter_members', 'read_chapters');
    }
};
