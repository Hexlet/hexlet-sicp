<?php

return [
    'title' => 'Miller-Rabin test',
    'description' => [
        '1' =>
        "One variant of the Fermat test that cannot be fooled is called the Miller-Rabin test (Miller 1976; Rabin 1980). " .
        "This starts from an alternate form of Fermat's Little Theorem, which states that if ",
        '2' =>
        " is a prime number and ",
        '3' =>
        " is any positive integer less than ",
        '4' =>
        ", then a raised to the (",
        '5' =>
        ")st power is congruent to 1 modulo ",
        '6' =>
        ". To test the primality of a number ",
        '7' =>
        " by the Miller-Rabin test, we pick a random number ",
        '8' =>
        " and raise a to the (",
        '9' =>
        ")st power modulo ",
        '10' =>
        " using the ",
        '11' =>
        " procedure. However, whenever we perform the squaring step in ",
        '12' =>
        ", we check to see if we have discovered a ``nontrivial square root of 1 modulo ",
        '13' =>
        ",'' that is, a number not equal to 1 or ",
        '14' =>
        " whose square is equal to 1 modulo ",
        '15' =>
        ". It is possible to prove that if such a nontrivial square root of 1 exists, then ",
        '16' =>
        " is not prime. It is also possible to prove that if ",
        '17' =>
        " is an odd number that is not prime, then, for at least half the numbers ",
        '18' =>
        ", computing ",
        '19' =>
        " in this way will reveal a nontrivial square root of 1 modulo ",
        '20' =>
        ". (This is why the Miller-Rabin test cannot be fooled.) Modify the ",
        '21' =>
        " procedure to signal if it discovers a nontrivial square root of 1, and use this to implement the Miller-Rabin test with a procedure ",
        '22' =>
        " analogous to ",
        '23' =>
        ". Check your procedure by testing various known primes and non-primes. Hint: One convenient way to make ",
        '24' =>
        " signal is to have it return 0.",
    ],
];
