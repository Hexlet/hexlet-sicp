<?php

use App\Models\Comment;
use Illuminate\Database\Migrations\Migration;

class DeleteCommentsWithoutUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Comment::whereDoesntHave('user')->delete();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /** @var \App\Models\Comment|\App\Models\Comment[] $comments */
        $comments = Comment::whereDoesntHave('user');

        $comments->restore();
    }
}
