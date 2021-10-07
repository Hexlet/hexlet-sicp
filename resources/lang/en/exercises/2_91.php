<?php

return [
    'title' => "Division of univariate polynomial",
    'description' => [
        '1' =>
        "A univariate polynomial can be divided by another one to produce a polynomial quotient and a polynomial remainder. For example,",
        '2' =>
        "Division can be performed via long division. " .
        "That is, divide the highest-order term of the dividend by the highest-order term of the divisor. " .
        "The result is the first term of the quotient. " .
        "Next, multiply the result by the divisor, subtract that from the dividend, and produce the rest of the answer by recursively dividing the difference by the divisor. " .
        "Stop when the order of the divisor exceeds the order of the dividend and declare the dividend to be the remainder. " .
        "Also, if the dividend ever becomes zero, return zero as both quotient and remainder.",
        '3' =>
        "We can design a ",
        '4' =>
        " procedure on the model of ",
        '5' =>
        " and ",
        '6' =>
        ". The procedure checks to see if the two polys have the same variable. If so, ",
        '7' =>
        " strips off the variable and passes the problem to ",
        '8' =>
        ", which performs the division operation on term lists. ",
        '9' =>
        " finally reattaches the variable to the result supplied by ",
        '10' =>
        ". It is convenient to design ",
        '11' =>
        " to compute both the quotient and the remainder of a division. " .
        "Div-terms can take two term lists as arguments and return a list of the quotient term list and the remainder term list.",
        '12' =>
        "Complete the following definition of ",
        '13' =>
        " by filling in the missing expressions. Use this to implement ",
        '14' =>
        ", which takes two ",
        '15' =>
        " as arguments and returns a list of the ",
        '16' =>
        " quotient and ",
        '17' =>
        " remainder.",
    ],
];
