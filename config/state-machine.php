<?php

use App\Models\ChapterMember;
use App\Models\ExerciseMember;

return [
    'chapter_member' => [
        'class' => ChapterMember::class,
        'graph' => 'chapter_member',
        'states' => [
            ChapterMember::STATE_STARTED,
            ChapterMember::STATE_FINISHED,
        ],
        'transitions' => [
            'finish' => [
                'from' => [ChapterMember::STATE_STARTED],
                'to' => ChapterMember::STATE_FINISHED,
            ],
        ],
    ],
    'completed_exercise' => [
        'class' => ExerciseMember::class,
        'graph' => 'completed_exercise',
        'property_path' => 'state',
        'states' => [
            ExerciseMember::STATE_STARTED,
            ExerciseMember::STATE_FINISHED,
        ],
        'transitions' => [
            'finish' => [
                'from' => [ExerciseMember::STATE_STARTED],
                'to' => ExerciseMember::STATE_FINISHED,
            ],
        ],
    ],
];
