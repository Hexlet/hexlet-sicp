<?php

return [
    'title' => "Exploration of the tail-recursive property of the evaluator",
    'description' => [
        '1' =>
        "Use the monitored stack to explore the tail-recursive property of the evaluator (section 5.4.2). Start the evaluator and define the iterative factorial procedure from section 1.2.1:",
        '2' =>
        "Run the procedure with some small values of n. Record the maximum stack depth and the number of pushes required to compute n! for each of these values.",
        '3' =>
        "a. You will find that the maximum depth required to evaluate n! is independent of n. What is that depth?",
        '4' =>
        "b. Determine from your data a formula in terms of n for the total number of push operations used in evaluating n! for any n ≥ 1. Note that the number of operations used is a linear function of n and is thus determined by two constants."
    ]
];
