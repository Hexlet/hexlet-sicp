<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropLinkColumnExerciseTable extends Migration
{
    /**
     * Run the migrations.
     *
     */
    public function up(): void
    {
        Schema::table('exercises', function (Blueprint $table): void {
            $table->dropColumn('link_to_origin');
        });
    }

    /**
     * Reverse the migrations.
     *
     */
    public function down(): void
    {
        Schema::table('exercises', function (Blueprint $table): void {
            $table->addColumn('text', 'link_to_origin')->nullable();
        });
    }
}
