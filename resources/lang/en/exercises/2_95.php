<?php

return [
    'title' => "Pseudodivision",
    'description' => [
        '1' =>
        "Define P1, P2, and P3 to be the polynomials",
        '2' =>
        "Now define Q1 to be the product of P1 and P2 and Q2 to be the product of P1 and P3, and use greatest-common-divisor (exercise 2.94) to compute the GCD of Q1 and Q2. " .
        "Note that the answer is not the same as P1. This example introduces noninteger operations into the computation, causing difficulties with the GCD algorithm.(61) " .
        "To understand what is happening, try tracing gcd-terms while computing the GCD or try performing the division by hand. ",
        '3' =>
        "We can solve the problem exhibited in exercise 2.95 if we use the following modification of the GCD algorithm " .
        "(which really works only in the case of polynomials with integer coefficients). Before performing any polynomial division in the GCD computation, " .
        "we multiply the dividend by an integer constant factor, chosen to guarantee that no fractions will arise during the division process. " .
        "Our answer will thus differ from the actual GCD by an integer constant factor, but this does not matter in the case of reducing rational functions to lowest terms; " .
        "the GCD will be used to divide both the numerator and denominator, so the integer constant factor will cancel out.",
        '4' =>
        "More precisely, if P and Q are polynomials, let O1 be the order of P (i.e., the order of the largest term of P) and let O2 be the order of Q. " .
        "Let c be the leading coefficient of Q. Then it can be shown that, if we multiply P by the integerizing factor c1 + O1 - O2, the resulting polynomial can be divided by Q " .
        "by using the div-terms algorithm without introducing any fractions. The operation of multiplying the dividend by this constant and then dividing is sometimes called the pseudodivision of P by Q. " .
        "The remainder of the division is called the pseudoremainder."
    ]
];
