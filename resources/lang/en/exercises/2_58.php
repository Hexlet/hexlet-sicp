<?php

return [
    'title' => "Modification of the differentiation program",
    'description' => [
        '1' =>
        "Suppose we want to modify the differentiation program so that it works with ordinary mathematical notation, in which ",
        '2' =>
        " and ",
        '3' =>
        " are infix rather than prefix operators. " .
        "Since the differentiation program is defined in terms of abstract data, we can modify it to work with different representations of expressions solely by changing the predicates, selectors, and constructors that define the representation of the algebraic expressions on which the differentiator is to operate.",
        '4' =>
        "a. Show how to do this in order to differentiate algebraic expressions presented in infix form, such as ",
        '5' =>
        ". To simplify the task, assume that ",
        '6' =>
        " and ",
        '7' =>
        " always take two arguments and that expressions are fully parenthesized.",
        '8' =>
        "b. The problem becomes substantially harder if we allow standard algebraic notation, such as ",
        '9' =>
        ", which drops unnecessary parentheses and assumes that multiplication is done before addition. " .
        "Can you design appropriate predicates, selectors, and constructors for this notation such that our derivative program still works?",
    ],
];
