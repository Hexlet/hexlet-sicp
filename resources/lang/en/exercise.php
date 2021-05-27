<?php

return [
    'exercise' => 'Exercise',
    'index' => [
        'description' => 'List of exercises in the book Structure and Interpretation of Computer Programs',
    ],
    'show' => [
        'description' => 'from the Structure and Interpretation of Computer Programs',
        'exercises' => 'show exercises',
        'who_completed' => 'Show who completed',
        'empty_description' => 'No description for this exercise',
        'nobody_completed' => 'Nobody\'s finished this exercise yet. You\'ll be the first!',
        'mark_complete' => 'Mark exercise as completed',
        'already_completed' => 'Completed',
        'help_us' => 'Help us by adding new exercises',
        'completed_by' => 'Completed by:',
        'previous' => 'Previous',
        'next' => 'Next',
        'editor-tab' => 'Editor',
        'discussion-tab' => 'Discussion',
        'description-tab' => 'Exercise',
        'output-tab' => 'Output',
        'tests-tab' => 'Tests',
        'editor' => [
            'auth' => [
                'required' => 'Authentication required',
                'must_log_in' => 'You must log in to use editor.',
            ],
            'message' => [
                'failed' => 'Failed to verify the solution. See the "Output" tab.',
                'success' => 'Good for you! Don\'t forget to save the solution.',
                'has_not_tests' => 'There are no tests for this exercise. Any solution will be considered a successful answer.',
                'empty_solution' => 'Unable to save. The solution is empty.',
            ],
            'run' => 'Run',
        ],
    ],
    'mark_exercise' => 'Mark :exercise_path completed',
    'remove_completed_exercise' => 'Remove :exercise_path from completed',
];
