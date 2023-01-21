<?php

use App\Models\CompletedExercise;

return [
    'completed_exercise' => [
        'class' => CompletedExercise::class,
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
