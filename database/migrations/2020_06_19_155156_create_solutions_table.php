<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     */
    public function up(): void
    {
        Schema::create('solutions', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->bigInteger('exercise_id');
            $table->bigInteger('user_id');
            $table->text('content');
            $table->timestamps();

            $table->foreign('exercise_id')
                ->references('id')
                ->on('exercises');

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
        Schema::dropIfExists('solutions');
    }
}
