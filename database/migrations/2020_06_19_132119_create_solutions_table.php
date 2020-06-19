<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionsTable extends Migration
{
    public function up()
    {
        Schema::create('solutions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('completedExercise_id');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('completedExercise_id')
            ->references('id')
            ->on('completed_exercises');
        });
    }

    public function down()
    {
        Schema::dropIfExists('solutions');
    }
}
