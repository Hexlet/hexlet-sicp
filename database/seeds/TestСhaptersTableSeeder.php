<?php

use App\Chapter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Yaml\Yaml;

class TestChaptersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parents = [null];
        factory(Chapter::class, 10)->create()->each(function (Chapter $chapter) use (&$parents) {
            $parent_id = array_rand($parents);
            $chapter->parent_id = $parents[$parent_id];
            $parents[] = $chapter->id;
            $chapter->save();
        });
    }
}
