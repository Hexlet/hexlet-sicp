<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookNode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_nodes', function (Blueprint $table) {
            $table->string('description');
            $table->integer('type');
            $table->integer('order_number');
            $table->integer('parent_id')->nullable(true);
            $table->bigIncrements('id');
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('book_nodes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_nodes');
    }
}
