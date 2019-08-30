<?php

namespace Tests;

use App\BookNode;
use App\Constants;

class Factories
{
    public static function createNodesTree($chaptersCount=1, $sectionsCounter=2, $exercisesCounter=5)
    {
        $chapters = factory(BookNode::class, $chaptersCount)->create();
        $chapters->each(function ($chapter) use ($sectionsCounter, $exercisesCounter) {
            $chapter->childs()
                ->saveMany(
                    factory(BookNode::class, $sectionsCounter)
                    ->make(['type' => Constants::BOOK_TYPES['section']])
                    ->each(function ($section) use ($exercisesCounter) {
                        $section->childs()
                            ->saveMany(
                                factory(BookNode::class, $exercisesCounter)
                                    ->make(['type' => Constants::BOOK_TYPES['exercise']])
                            );
                    })
                );
        });
        
        return $chapters;
    }
}
