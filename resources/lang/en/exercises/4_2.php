<?php

return [
    'title' => 'Help Louis',
    'description' => [
        '1' =>
        "Louis Reasoner plans to reorder the ",
        '2' =>
        " clauses in eval so that the clause for procedure applications " .
        "appears before the clause for assignments. He argues that this will make the interpreter more efficient: Since " .
        "programs usually contain more applications than assignments, definitions, and so on, his modified eval will usually " .
        "check fewer clauses than the original ",
        '3' =>
        " before identifying the type of an expression.",
        '4' =>
        "a. What is wrong with Louis's plan? (Hint: What will Louis's evaluator do with the expression ",
        '5' =>
        "?)",
        '6' =>
        "b. Louis is upset that his plan didn't work. He is willing to go to any lengths to make his evaluator " .
        "recognize procedure applications before it checks for most other kinds of expressions. Help him by changing the " .
        "syntax of the evaluated language so that procedure applications start with ",
        '7' =>
        ". For example, instead of ",
        '8' =>
        " we will now have to write ",
        '9' =>
        " and instead of ",
        '10' =>
        " we will have to write ",
        '11' =>
        ".",
    ],
];
