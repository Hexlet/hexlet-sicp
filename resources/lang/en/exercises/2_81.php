<?php

return [
    'title' => "Coercion of the arguments with same type",
    'description' => [
        '1' =>
        "Louis Reasoner has noticed that apply-generic may try to coerce the arguments to each other's type even if they already have the same type. " .
        "Therefore, he reasons, we need to put procedures in the coercion table to 'coerce' arguments of each type to their own type. " .
        "For example, in addition to the scheme-number->complex coercion shown above, he would do:",
        '2' =>
        "a. With Louis's coercion procedures installed, what happens if apply-generic is called with two arguments of type scheme-number or two arguments of type complex for an operation that is not found in the table for those types? " .
        "For example, assume that we've defined a generic exponentiation operation:",
        '3' =>
        "and have put a procedure for exponentiation in the Scheme-number package but not in any other package:",
        '4' =>
        ";; following added to Scheme-number package",
        '5' =>
        "What happens if we call exp with two complex numbers as arguments?",
        '6' =>
        "b. Is Louis correct that something had to be done about coercion with arguments of the same type, or does apply-generic work correctly as is?",
        '7' =>
        "c. Modify apply-generic so that it doesn't try coercion if the two arguments have the same type."
    ]
];
