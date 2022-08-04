<?php

return [
    'title' => "Pseudodivision",
    'description' => [
        '1' =>
        "Define ",
        '2' =>
        ", ",
        '3' =>
        ", and ",
        '4' =>
        " to be the polynomials",
        '5' =>
        "Now define ",
        '6' =>
        " to be the product of ",
        '7' =>
        " and ",
        '8' =>
        " and ",
        '9' =>
        " to be the product of ",
        '10' =>
        " and P₃",
        '11' =>
        ", and use ",
        '12' =>
        " (exercise ",
        '13' =>
        ") to compute the GCD of ",
        '14' =>
        " and ",
        '15' =>
        ". Note that the answer is not the same as ",
        '16' =>
        ". This example introduces noninteger operations into the computation, causing difficulties with the GCD algorithm. " .
        "To understand what is happening, try tracing ",
        '17' =>
        " while computing the GCD or try performing the division by hand. ",
        '18' =>
        "We can solve the problem exhibited in exercise ",
        '19' =>
        " if we use the following modification of the GCD algorithm " .
        "(which really works only in the case of polynomials with integer coefficients). Before performing any polynomial division in the GCD computation, " .
        "we multiply the dividend by an integer constant factor, chosen to guarantee that no fractions will arise during the division process. " .
        "Our answer will thus differ from the actual GCD by an integer constant factor, but this does not matter in the case of reducing rational functions to lowest terms; " .
        "the GCD will be used to divide both the numerator and denominator, so the integer constant factor will cancel out.",
        '20' =>
        "More precisely, if ",
        '21' =>
        " and ",
        '22' =>
        " are polynomials, let ",
        '23' =>
        " be the order of ",
        '24' =>
        " (i.e., the order of the his largest term ) and let ",
        '25' =>
        " be the order of ",
        '26' =>
        ". Let ",
        '27' =>
        " be the leading coefficient of ",
        '28' =>
        ". Then it can be shown that, if we multiply ",
        '29' =>
        " by the integerizing factor ",
        '30' =>
        ", the resulting polynomial can be divided by ",
        '31' =>
        " by using the ",
        '32' =>
        " algorithm without introducing any fractions. The operation of multiplying the dividend by this constant and then dividing is sometimes called the pseudodivision of ",
        '33' =>
        " by ",
        '34' =>
        ". The remainder of the division is called the pseudoremainder.",
    ],
];
