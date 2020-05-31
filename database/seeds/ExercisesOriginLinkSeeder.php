<?php

use Illuminate\Database\Seeder;

class ExercisesOriginLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $linksToOrigin = Yaml::parseFile(database_path('exercise-links.yml'));
        DB::beginTransaction();
        $exercises = \App\Exercise::whereNull('link_to_origin')->get();
        $exercises->each(function (\App\Exercise $e) use ($linksToOrigin) {
            $e->link_to_origin = $linksToOrigin[$e->path];
            $e->save();
        });
        DB::commit();
    }
}
