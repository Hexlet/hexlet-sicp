<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddParentIdToChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     */
    public function up(): void
    {
        Schema::table('chapters', function (Blueprint $table): void {
            $table->integer('parent_id')
                ->unsigned()
                ->nullable();

            $table
                ->foreign('parent_id')
                ->references('id')
                ->on('chapters');
        });
    }

    /**
     * Reverse the migrations.
     *
     */
    public function down(): void
    {
        Schema::table('chapters', function (Blueprint $table): void {
            //$table->dropColumn('parent_id');
        });
    }
}
