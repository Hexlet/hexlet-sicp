<?php

use Illuminate\Database\Seeder;

class ChaptersParentIdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chapters = DB::table('chapters')->select()->get();

        $chapters->map(function ($chapter) {
            $parent = DB::table('chapters')
                ->where('path', substr($chapter->path, 0, strlen($chapter->path) - 2))
                ->select()
                ->first();

            DB::table('chapters')
                ->where('id', $chapter->id)
                ->update(['parent_id' => optional($parent)->id]);
        });
    }
}
