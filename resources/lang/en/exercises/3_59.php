<?php

return [
    'title' => "Power series represented as infinite streams",
    'description' => [
        '1' =>
        "In section 2.5.3 we saw how to implement a polynomial arithmetic system representing polynomials as lists of terms. In a similar way, we can work with power series, such as",
        '2' =>
        "represented as infinite streams. We will represent the series ",
        '3' =>
        " as the stream whose elements are the coefficients ",
        '4' =>
        ".",
        '5' =>
        "a. The integral of the series ",
        '6' =>
        " is the series",
        '7' =>
        "where ",
        '8' =>
        " is any constant. Define a procedure ",
        '9' =>
        " that takes as input a stream ",
        '10' =>
        " representing a power series and returns the stream ",
        '11' =>
        " of coefficients of the non-constant terms of the integral of the series. (Since the result has no constant term, it doesn't represent a power series; when we use ",
        '12' =>
        ", we will ",
        '13' =>
        " on the appropriate constant.)",
        '14' =>
        "b. The function ",
        '15' =>
        " is its own derivative. This implies that ",
        '16' =>
        " and the integral of ",
        '17' =>
        " are the same series, except for the constant term, which is ",
        '18' =>
        ". Accordingly, we can generate the series for ",
        '19' =>
        " as",
        '20' =>
        "Show how to generate the series for sine and cosine, starting from the facts that the derivative of sine is cosine and the derivative of cosine is the negative of sine:",
    ],
];
