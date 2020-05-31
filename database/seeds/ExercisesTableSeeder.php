<?php

use App\Chapter;
use App\Exercise;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Yaml\Yaml;

class ExercisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exercises =  Yaml::parseFile(database_path('exercises.yml'));
        $linksToOrigin = Yaml::parseFile(database_path('exercise-links.yml'));
        DB::beginTransaction();
        $createExercises = function ($exercises) use ($linksToOrigin) {
            foreach ($exercises as ['chapter_path' => $chapter_path, 'children' => $children]) {
                $chapter = Chapter::where('path', $chapter_path)->value('id');

                array_map(function ($exercise) use ($chapter, $linksToOrigin) {
                    $exerciseModel = new Exercise();
                    $exerciseModel->chapter_id = $chapter;
                    $exerciseModel->path = $exercise;
                    $exerciseModel->link_to_origin = $linksToOrigin[$exercise];
                    $exerciseModel->save();
                }, $children);
            }
        };
        $createExercises($exercises);
        DB::commit();
    }
}
