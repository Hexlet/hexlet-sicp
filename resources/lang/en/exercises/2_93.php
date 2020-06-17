<?php

return [
    'title' => "Generic operations in rational-arithmetic package",
    'description' => [
        '1' =>
        "Modify the rational-arithmetic package to use generic operations, but change make-rat so that it does not attempt to reduce fractions to lowest terms. " .
        "Test your system by calling make-rational on two polynomials to produce a rational function",
        '2' =>
        "Now add rf to itself, using add. You will observe that this addition procedure does not reduce fractions to lowest terms."
    ]
];
