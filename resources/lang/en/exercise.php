<?php

return [
    'exercise' => 'Exercise',
    'index' => [
        'description' => 'List of exercises in the book Structure and Interpretation of Computer Programs',
    ],
    'show' => [
        'description' => 'in the book Structure and Interpretation of Computer Programs',
        'exercises' => 'show exercises',
        'who_completed' => 'Show users who completed',
        'empty_description' => 'This exercise has no description',
        'nobody_completed' => 'No users have completed this exercise yet. You can be the first!',
        'mark_complete' => 'Mark as completed',
        'already_completed' => 'Completed',
        'help_us' => 'Support the site by adding new exercises',
        'completed_by' => 'Completed by:',
        'previous' => 'Previous',
        'next' => 'Next',
        'editor-tab' => 'Editor',
        'discussion-tab' => 'Discussion',
        'description-tab' => 'Description',
        'output-tab' => 'Output',
        'tests-tab' => 'Tests',
        'Hexlet SICP' => 'Hexlet SICP',
        'editor' => [
            'auth' => [
                'required' => 'Authentication required',
                'must_log_in' => 'You must log in to use the editor.',
            ],
            'message' => [
                'failed' => 'Failed to verify the solution. See the "Output" tab.',
                'success' => 'Great job! Don\'t forget to save your solution.',
                'has_not_tests' => 'This exercise has no tests. Any solution is a right answer.',
                'empty_solution' => 'Failed to save. The solution is empty.',
            ],
            'run' => 'Run',
        ],
    ],
    'mark_exercise' => 'Mark :exercise_path as completed',
    'remove_completed_exercise' => 'Remove :exercise_path from completed',
];
