<?php

use App\Chapter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Yaml\Yaml;

class ChaptersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chapters = Yaml::parseFile(database_path('chapters.yml'));
        DB::beginTransaction();
        $createChapters = function ($chapters, Chapter $parent = null) use (&$createChapters) {
            foreach ($chapters as $chapter) {
                $children = $chapter['children'] ?? null;

                $chapterModel = new Chapter();
                $chapterModel->path = $chapter['path'];
                $chapterModel->parent()->associate($parent);
                $chapterModel->save();

                if (false === is_null($children)) {
                    $createChapters($children, $chapterModel);
                }
            }
        };
        $createChapters($chapters, null);
        DB::commit();
    }
}
