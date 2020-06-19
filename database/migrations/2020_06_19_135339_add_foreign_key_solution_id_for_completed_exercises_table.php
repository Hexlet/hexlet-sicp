<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeySolutionIdForCompletedExercisesTable extends Migration
{
    public function up()
    {
        Schema::table('completed_exercises', function (Blueprint $table) {
            $table->bigInteger('solution_id');

            $table->foreign('solution_id')
            ->references('id')
            ->on('solutions');
        });
    }

    public function down()
    {
        Schema::table('completed_exercises', function (Blueprint $table) {
            $table->dropColumn('solution_id');
        });
    }
}
