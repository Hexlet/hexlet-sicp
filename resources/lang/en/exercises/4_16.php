<?php

return [
    'title' => 'Implement the method for interpreting internal definitions',
    'description' => [
        '1' => "In this exercise we implement the method just described for interpreting internal " .
        "definitions. We assume that the evaluator supports let (see exercise ",
        '2' => ").",
        '3' => "a. Change lookup-variable-value (section 4.1.3) to signal an error if the value it " .
        "finds is the symbol *unassigned*.",
        '4' => "b. Write a procedure scan-out-defines that takes a procedure body and returns an " .
        "equivalent one that has no internal definitions, by making the transformation described above.",
        '5' => "c. Install scan-out-defines in the interpreter, either in make-procedure or in " .
        "procedure-body (see section 4.1.3). Which place is better? Why?",
    ],
];
