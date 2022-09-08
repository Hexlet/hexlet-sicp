<?php

return [
    'title' => "Integerizing factor",
    'description' => [
        '1' =>
        "a. Implement the procedure ",
        '2' =>
        ", which is just like ",
        '3' =>
        " except that it multiplies the dividend by the integerizing factor described above before calling ",
        '4' =>
        ". Modify ",
        '5' =>
        " to use ",
        '6' =>
        ", and verify that ",
        '7' =>
        " now produces an answer with integer coefficients on the example in exercise ",
        '8' =>
        "b. The GCD now has integer coefficients, but they are larger than those of ",
        '9' =>
        ". Modify ",
        '10' =>
        " so that it removes common factors from the coefficients of the answer " .
        "by dividing all the coefficients by their (integer) greatest common divisor. ",
        '11' =>
        "Thus, here is how to reduce a rational function to lowest terms:",
        '12' =>
        "Compute the GCD of the numerator and denominator, using the version of ",
        '13' =>
        " from exercise ",
        '14' =>
        "When you obtain the GCD, multiply both numerator and denominator by the same integerizing factor before dividing through by the GCD, so that division by the GCD will not introduce any noninteger coefficients. " .
        "As the factor you can use the leading coefficient of the GCD raised to the power ",
        '15' =>
        ", where ",
        '16' =>
        " is the order of the GCD and ",
        '17' =>
        " is the maximum of the orders of the numerator and denominator. " .
        "This will ensure that dividing the numerator and denominator by the GCD will not introduce any fractions.",
        '18' =>
        "The result of this operation will be a numerator and denominator with integer coefficients. " .
        "The coefficients will normally be very large because of all of the integerizing factors, " .
        "so the last step is to remove the redundant factors by computing the (integer) greatest common divisor " .
        "of all the coefficients of the numerator and the denominator and dividing through by this factor. ",
    ],
];
