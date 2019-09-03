<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapterUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('chapter_id');
            $table->bigInteger('user_id');
            $table->timestamps();

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
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapter_user');
    }
}
