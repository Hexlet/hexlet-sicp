<?php

return [
    'title' => 'Order for evaluating subexpressions',
    'description' => [
        '1' =>
        'When we defined the evaluation model in section ',
        '2' =>
        ', we said that the first step in evaluating an expression is to evaluate its subexpressions. ' .
        'But we never specified the order in which the subexpressions should be evaluated ' .
        '(e.g., left to right or right to left). When we introduce assignment, ' .
        'the order in which the arguments to a procedure are evaluated can make a difference to the result. ' .
        'Define a simple procedure ',
        '3' =>
        ' such that evaluating ',
        '4' =>
        ' will return ',
        '5' =>
        ' if the arguments to ',
        '6' =>
        ' are evaluated from left to right but will return ',
        '7' =>
        ' if the arguments are evaluated from right to left.',
    ],
];
