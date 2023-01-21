<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function () {
            Schema::table('completed_exercises', function (Blueprint $t) {
                $t->string('state')->nullable();
            });
            DB::table('completed_exercises')->update([
                'state' => 'finished',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('completed_exercises', function (Blueprint $t) {
            $t->dropColumn('state');
        });
    }
};
