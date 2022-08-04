<?php

return [
    'title' => "Compile-variable and compile-assignment with lexical-address instructions",
    'description' => [
        '1' =>
        "Using ",
        '2' =>
        " from exercise ",
        '3' =>
        ", rewrite ",
        '4' =>
        " and ",
        '5' =>
        " to output lexical-address instructions. In cases where ",
        '6' =>
        " returns ",
        '7' =>
        " (that is, where the variable is not in the compile-time environment), you should have the code generators use the evaluator operations, as before, to search for the binding. " .
        "(The only place a variable that is not found at compile time can be is in the global environment, which is part of the run-time environment but is not part of the compile-time environment. " .
        "Thus, if you wish, you may have the evaluator operations look directly in the global environment, which can be obtained with the operation ",
        '8' =>
        ", instead of having them search the whole run-time environment found in ",
        '9' =>
        ".) Test the modified compiler on a few simple cases, such as the nested ",
        '10' =>
        " combination at the beginning of this section.",
    ],
];
