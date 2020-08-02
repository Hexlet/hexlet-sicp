<?php

return [
    'title' => 'Order for evaluating subexpressions',
    'description1' =>
        'When we defined the evaluation model in section ',
    'description2' =>
        ', we said that the first step in evaluating an expression is to evaluate its subexpressions. ' .
        'But we never specified the order in which the subexpressions should be evaluated ' .
        '(e.g., left to right or right to left). When we introduce assignment, ' .
        'the order in which the arguments to a procedure are evaluated can make a difference to the result. ' .
        'Define a simple procedure ',
    'description3' =>
        ' such that evaluating ',
    'description4' =>
        ' will return ',
    'description5' =>
        ' if the arguments to ',
    'description6' =>
        ' are evaluated from left to right but will return ',
    'description7' =>
        ' if the arguments are evaluated from right to left.',
];
