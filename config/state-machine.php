<?php

use App\Models\ChapterMember;
use App\Models\ExerciseMember;

return [
    'chapter_member' => [
        'class' => ChapterMember::class,
        'graph' => 'chapter_member',
        'states' => [
            'started',
            'finished',
        ],
        'transitions' => [
            'finish' => [
                'from' => ['started'],
                'to' => 'finished',
            ],
        ],
    ],
    'completed_exercise' => [
        'class' => ExerciseMember::class,
        'graph' => 'completed_exercise',
        'property_path' => 'state',
        'states' => [
            'started',
            'finished',
        ],
        'transitions' => [
            'finish' => [
                'from' => ['started'],
                'to' => 'finished',
            ],
        ],
    ],
];
