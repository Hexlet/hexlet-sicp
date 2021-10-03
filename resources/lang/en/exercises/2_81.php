<?php

return [
    'title' => "Coercion of the arguments with same type",
    'description' => [
        '1' =>
        "Louis Reasoner has noticed that ",
        '2' =>
        " may try to coerce the arguments to each other's type even if they already have the same type. " .
        "Therefore, he reasons, we need to put procedures in the coercion table to 'coerce' arguments of each type to their own type. " .
        "For example, in addition to the ",
        '3' =>
        " coercion shown above, he would do:",
        '4' =>
        "a. With Louis's coercion procedures installed, what happens if ",
        '5' =>
        " is called with two arguments of type ",
        '6' =>
        " or two arguments of type ",
        '7' =>
        " for an operation that is not found in the table for those types? " .
        "For example, assume that we've defined a generic exponentiation operation:",
        '8' =>
        "and have put a procedure for exponentiation in the ",
        '9' =>
        " package but not in any other package:",
        '10' =>
        ";; following added to ",
        '11' =>
        " package",
        '12' =>
        "What happens if we call ",
        '13' =>
        " with two complex numbers as arguments?",
        '14' =>
        "b. Is Louis correct that something had to be done about coercion with arguments of the same type, or does all work correctly as is?",
        '15' =>
        "c. Modify ",
        '16' =>
        " so that it doesn't try coercion if the two arguments have the same type.",
    ],
];
