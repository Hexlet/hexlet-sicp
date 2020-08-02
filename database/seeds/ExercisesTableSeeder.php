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
     */
    public function run(): void
    {
        $exercises =  Yaml::parseFile(database_path('exercises.yml'));
        DB::beginTransaction();
        $createExercises = function ($exercises): void {
            foreach ($exercises as ['chapter_path' => $chapter_path, 'children' => $children]) {
                $chapter = Chapter::where('path', $chapter_path)->value('id');

                array_map(function ($exercise) use ($chapter): void {
                    $exerciseModel = new Exercise();
                    $exerciseModel->chapter_id = $chapter;
                    $exerciseModel->path = $exercise;
                    $exerciseModel->save();
                }, $children);
            }
        };
        $createExercises($exercises);
        DB::commit();
    }
}
