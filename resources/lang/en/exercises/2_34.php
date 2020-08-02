<?php

return [
    'title' => "Horner's rule",
    'description' => [
        '1' =>
        "Evaluating a polynomial in x at a given value of x can be formulated as an accumulation. We evaluate the polynomial",
        '2' =>
        "using a well-known algorithm called Horner's rule, which structures the computation as",
        '3' =>
        "In other words, we start with aₙ, multiply by x, add aₙ₋₁, multiply by x, and so on, until we reach a₀. " .
        "Fill in the following template to produce a procedure that evaluates a polynomial using Horner's rule. " .
        "Assume that the coefficients of the polynomial are arranged in a sequence, from a₀ through aₙ.",
        '4' =>
        "For example, to compute 1 + 3x + 5x³ + x⁵ at x = 2 you would evaluate",
    ],
];
