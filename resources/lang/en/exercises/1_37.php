<?php

return [
    'title' => 'Finite continued fraction',
    'description' => [
        '1' =>
        "a. An infinite continued fraction is an expression of the form ",
        '2' =>
        "As an example, one can show that the infinite continued fraction expansion with the ",
        '3' =>
        " and the ",
        '4' =>
        " all equal to 1 produces ",
        '5' =>
        ", where ",
        '6' =>
        " is the golden ratio (described in section 1.2.2). One way to approximate an infinite continued fraction is to truncate the expansion after a given number of terms. " .
        "Such a truncation -- a so-called ",
        '7' =>
        "-term finite continued fraction -- has the form ",
        '8' =>
        "Suppose that ",
        '9' =>
        " and ",
        '10' =>
        " are procedures of one argument (the term index ",
        '11' =>
        ") that return the ",
        '12' =>
        " and ",
        '13' =>
        " of the terms of the continued fraction. Define a procedure ",
        '14' =>
        " such that evaluating ",
        '15' =>
        " computes the value of the ",
        '16' =>
        "-term finite continued fraction. Check your procedure by approximating ",
        '17' =>
        " using ",
        '18' =>
        "or successive values of ",
        '19' =>
        ". How large must you make ",
        '20' =>
        " in order to get an approximation that is accurate to 4 decimal places?",
        '21' =>
        "b. If your ",
        '22' =>
        " procedure generates a recursive process, write one that generates an iterative process. " .
        "If it generates an iterative process, write one that generates a recursive process.",
    ],
];
