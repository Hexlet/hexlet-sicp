<?php

return [
    'title' => 'Number of procedure calls',
    'description1' =>
        'In software-testing applications, it is useful to be able to count the number of times a given procedure is called during the course of a computation. ' .
        'Write a procedure ',
    'description2' =>
        ' that takes as input a procedure, ',
    'description3' =>
        ', that itself takes one input. ' .
        'The result returned by ',
    'description4' =>
        ' is a third procedure, say ',
    'description5' =>
        ', that keeps track of the number of times it has been called by maintaining an internal counter. ' .
        'If the input to ',
    'description6' =>
        ' is the special symbol ',
    'description7' =>
        ', then mf returns the value of the counter. ' .
        'If the input is the special symbol reset-count, then ',
    'description8' =>
        ' resets the counter to zero. ' .
        'For any other input, ',
    'description9' =>
        ' returns the result of calling ',
    'description10' =>
        ' on that input and increments the counter. ' .
        'For instance, we could make a monitored version of the ',
    'description11' =>
        ' procedure:',
];
