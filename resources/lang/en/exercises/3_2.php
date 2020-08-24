<?php

return [
    'title' => 'Number of procedure calls',
    'description' => [
        '1' =>
        'In software-testing applications, it is useful to be able to count the number of times a given procedure is called during the course of a computation. ' .
        'Write a procedure ',
        '2' =>
        ' that takes as input a procedure, ',
        '3' =>
        ', that itself takes one input. ' .
        'The result returned by ',
        '4' =>
        ' is a third procedure, say ',
        '5' =>
        ', that keeps track of the number of times it has been called by maintaining an internal counter. ' .
        'If the input to ',
        '6' =>
        ' is the special symbol ',
        '7' =>
        ', then mf returns the value of the counter. ' .
        'If the input is the special symbol reset-count, then ',
        '8' =>
        ' resets the counter to zero. ' .
        'For any other input, ',
        '9' =>
        ' returns the result of calling ',
        '10' =>
        ' on that input and increments the counter. ' .
        'For instance, we could make a monitored version of the ',
        '11' =>
        ' procedure:',
    ],
];
