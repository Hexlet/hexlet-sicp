<?php

return [
    'title' => "Superfluous operations",
    'description' => [
        '1' =>
        "In evaluating a procedure application, the explicit-control evaluator always saves and restores the ",
        '2' =>
        " register around the evaluation of the operator, saves and restores ",
        '3' =>
        " around the evaluation of each operand (except the final one), saves and restores ",
        '4' =>
        " around the evaluation of each operand, and saves and restores ",
        '5' =>
        " around the evaluation of the operand sequence. For each of the following combinations, say which of these ",
        '6' =>
        " and ",
        '7' =>
        " operations are superfluous and thus could be eliminated by the compiler's ",
        '8' =>
        " mechanism:",
    ],
];
