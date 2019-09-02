<?php

use Illuminate\Database\Seeder;

class ChaptersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $preparedChapters = collect(
            __('sicp.chapters')
        )
        ->keys()
        ->map(function ($chapterNumber) {
            return ['number' => $chapterNumber];
        })->toArray();
        DB::table('chapters')->insert($preparedChapters);
    }
}
