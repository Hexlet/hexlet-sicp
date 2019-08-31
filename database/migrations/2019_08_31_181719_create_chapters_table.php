<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            //
            $table->unsignedBigIncrements('id');
            $table->string('number')->unique();
        });
        DB::table('chapters')->insert([
            ['number' => '1'],
            ['number' => '1.1'],
            ['number' => '1.1.1'],
            ['number' => '1.1.2'],
            ['number' => '1.1.3'],
            ['number' => '1.1.4'],
            ['number' => '1.1.5'],
            ['number' => '1.1.6'],
            ['number' => '1.1.7'],
            ['number' => '1.1.8'],
            ['number' => '1.2'],
            ['number' => '1.2.1'],
            ['number' => '1.2.2'],
            ['number' => '1.2.3'],
            ['number' => '1.2.4'],
            ['number' => '1.2.5'],
            ['number' => '1.2.6'],
            ['number' => '1.3'],
            ['number' => '1.3.1'],
            ['number' => '1.3.2'],
            ['number' => '1.3.3'],
            ['number' => '1.3.4'],
            ['number' => '2'],
            ['number' => '2.1'],
            ['number' => '2.1.1'],
            ['number' => '2.1.2'],
            ['number' => '2.1.3'],
            ['number' => '2.1.4'],
            ['number' => '2.2'],
            ['number' => '2.2.1'],
            ['number' => '2.2.2'],
            ['number' => '2.2.3'],
            ['number' => '2.2.4'],
            ['number' => '2.3'],
            ['number' => '2.3.1'],
            ['number' => '2.3.2'],
            ['number' => '2.3.3'],
            ['number' => '2.3.4'],
            ['number' => '2.4'],
            ['number' => '2.4.1'],
            ['number' => '2.4.2'],
            ['number' => '2.4.3'],
            ['number' => '2.5'],
            ['number' => '2.5.1'],
            ['number' => '2.5.2'],
            ['number' => '2.5.3'],
            ['number' => '3'],
            ['number' => '3.1'],
            ['number' => '3.1.1'],
            ['number' => '3.1.2'],
            ['number' => '3.1.3'],
            ['number' => '3.2'],
            ['number' => '3.2.1'],
            ['number' => '3.2.2'],
            ['number' => '3.2.3'],
            ['number' => '3.2.4'],
            ['number' => '3.3'],
            ['number' => '3.3.1'],
            ['number' => '3.3.2'],
            ['number' => '3.3.3'],
            ['number' => '3.3.4'],
            ['number' => '3.3.5'],
            ['number' => '3.4'],
            ['number' => '3.4.1'],
            ['number' => '3.4.2'],
            ['number' => '3.5'],
            ['number' => '3.5.1'],
            ['number' => '3.5.2'],
            ['number' => '3.5.3'],
            ['number' => '3.5.4'],
            ['number' => '3.5.5'],
            ['number' => '4'],
            ['number' => '4.1'],
            ['number' => '4.1.1'],
            ['number' => '4.1.2'],
            ['number' => '4.1.3'],
            ['number' => '4.1.4'],
            ['number' => '4.1.5'],
            ['number' => '4.1.6'],
            ['number' => '4.1.7'],
            ['number' => '4.2'],
            ['number' => '4.2.1'],
            ['number' => '4.2.2'],
            ['number' => '4.2.3'],
            ['number' => '4.3'],
            ['number' => '4.3.1'],
            ['number' => '4.3.2'],
            ['number' => '4.3.3'],
            ['number' => '4.4'],
            ['number' => '4.4.1'],
            ['number' => '4.4.2'],
            ['number' => '4.4.3'],
            ['number' => '4.4.4'],
            ['number' => '4.4.4.1'],
            ['number' => '4.4.4.2'],
            ['number' => '4.4.4.3'],
            ['number' => '4.4.4.4'],
            ['number' => '4.4.4.5'],
            ['number' => '4.4.4.6'],
            ['number' => '4.4.4.7'],
            ['number' => '4.4.4.8'],
            ['number' => '5'],
            ['number' => '5.1'],
            ['number' => '5.1.1'],
            ['number' => '5.1.2'],
            ['number' => '5.1.3'],
            ['number' => '5.1.4'],
            ['number' => '5.1.5'],
            ['number' => '5.2'],
            ['number' => '5.2.1'],
            ['number' => '5.2.2'],
            ['number' => '5.2.3'],
            ['number' => '5.2.4'],
            ['number' => '5.3'],
            ['number' => '5.3.1'],
            ['number' => '5.3.2'],
            ['number' => '5.4'],
            ['number' => '5.4.1'],
            ['number' => '5.4.2'],
            ['number' => '5.4.3'],
            ['number' => '5.4.4'],
            ['number' => '5.5'],
            ['number' => '5.5.1'],
            ['number' => '5.5.2'],
            ['number' => '5.5.3'],
            ['number' => '5.5.4'],
            ['number' => '5.5.5'],
            ['number' => '5.5.6'],
            ['number' => '5.5.7'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapters');
    }
}
