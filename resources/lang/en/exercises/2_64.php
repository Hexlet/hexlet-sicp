<?php

return [
    'title' => "Partial-tree procedure",
    'description' => [
        '1' =>
        "The following procedure list->tree converts an ordered list to a balanced binary tree. " .
        "The helper procedure partial-tree takes as arguments an integer n and list of at least n elements and constructs a balanced tree containing the first n elements of the list. " .
        "The result returned by partial-tree is a pair (formed with cons) whose car is the constructed tree and whose cdr is the list of elements not included in the tree.",
        '2' =>
        "a. Write a short paragraph explaining as clearly as you can how partial-tree works. Draw the tree produced by list->tree for the list (1 3 5 7 9 11).",
        '3' =>
        "b. What is the order of growth in the number of steps required by list->tree to convert a list of n elements?",
    ],
];
