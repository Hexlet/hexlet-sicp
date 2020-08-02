<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftDeletesToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('users', function (Blueprint $table): void {
            $table->dropSoftDeletes();
        });
        Schema::enableForeignKeyConstraints();
    }
}
