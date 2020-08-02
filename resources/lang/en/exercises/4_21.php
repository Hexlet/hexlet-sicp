<?php

return [
    'title' => 'Recursive procedures without using letrec',
    'description' => [
        '1' => "Amazingly, Louis's intuition in exercise 4.20 is correct. It is indeed possible to " .
        "specify recursive procedures without using letrec (or even define), although the method for " .
        "accomplishing this is much more subtle than Louis imagined. The following expression " .
        "computes 10 factorial by applying a recursive factorial procedure:",
        '2' => "a. Check (by evaluating the expression) that this really does compute factorials. " .
        "Devise an analogous expression for computing Fibonacci numbers.",
        '3' => "b. Consider the following procedure, which includes mutually recursive internal definitions:",
        '4' => "Fill in the missing expressions to complete an alternative definition of f, which uses " .
        "neither internal definitions nor letrec:",
    ],
];
