<?php

return [
    'title' => "Exploration of the tail-recursive property of the evaluator",
    'description' => [
        '1' =>
        "Use the monitored stack to explore the tail-recursive property of the evaluator (section 5.4.2). Start the evaluator and define the iterative ",
        '2' =>
        " procedure from section 1.2.1:",
        '3' =>
        "Run the procedure with some small values of ",
        '4' =>
        ". Record the maximum stack depth and the number of pushes required to compute ",
        '5' =>
        " for each of these values.",
        '6' =>
        "a. You will find that the maximum depth required to evaluate ",
        '7' =>
        " is independent of ",
        '8' =>
        ". What is that depth?",
        '9' =>
        "b. Determine from your data a formula in terms of ",
        '10' =>
        " for the total number of push operations used in evaluating ",
        '11' =>
        " for any ",
        '12' =>
        ". Note that the number of operations used is a linear function of ",
        '13' =>
        " and is thus determined by two constants.",
    ],
];
