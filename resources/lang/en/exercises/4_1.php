<?php

return [
    'title' => 'Evaluation order',
    'description' => [
        '1' =>
        "Notice that we cannot tell whether the metacircular evaluator evaluates operands from left to right or from right to left. " .
        "Its evaluation order is inherited from the underlying Lisp: If the arguments to ",
        '2' =>
        " in ",
        '3' =>
        " are evaluated from left to right, then ",
        '4' =>
        " will evaluate operands from left to right; and if the arguments to ",
        '5' =>
        " are evaluated from right to left, then ",
        '6' =>
        " will evaluate operands from right to left.",
        '7' =>
        "Write a version of ",
        '8' =>
        " that evaluates operands from left to right regardless of the order of evaluation in the underlying Lisp. " .
        "Also write a version that evaluates operands from right to left.",
    ],
];
