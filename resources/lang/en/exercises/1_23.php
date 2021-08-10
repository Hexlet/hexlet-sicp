<?php

return [
    'title' => "Modify the smallest-divisor",
    'description' => [
        '1' =>
        "The ",
        '2' =>
        " procedure shown at the start of this section does lots of needless testing: " .
        "After it checks to see if the number is divisible by 2 there is no point in checking to see if it is divisible by any larger even numbers. " .
        "This suggests that the values used for ",
        '3' =>
        " should not be 2, 3, 4, 5, 6, ..., but rather 2, 3, 5, 7, 9, .... To implement this change, define a procedure ",
        '4' =>
        " that returns 3 if its input is equal to 2 and otherwise returns its input plus 2. Modify the ",
        '5' =>
        " procedure to use ",
        '6' =>
        " instead of ",
        '7' =>
        ". With ",
        '8' =>
        " incorporating this modified version of ",
        '9' =>
        ", run the test for each of the 12 primes found in exercise ",
        '10' =>
        ". Since this modification halves the number of test steps, you should expect it to run about twice as fast. " .
        "Is this expectation confirmed? If not, what is the observed ratio of the speeds of the two algorithms, and how do you explain the fact that it is different from 2?",
    ],
];
