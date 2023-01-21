<?php

use App\Models\ExerciseMember;

return [
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
