<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReadChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     */
    public function up(): void
    {
        Schema::create('read_chapters', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->bigInteger('chapter_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            $table->unique(['chapter_id', 'user_id']);

            $table->foreign('chapter_id')
                ->references('id')
                ->on('chapters');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     */
    public function down(): void
    {
        Schema::dropIfExists('read_chapters');
    }
}
