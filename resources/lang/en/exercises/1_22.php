<?php

return [
    'title' => "Smallest primes",
    'description' => [
        '1' =>
        "Most Lisp implementations include a primitive called ",
        '2' =>
        " that returns an integer that specifies the amount of time the system has been running (measured, for example, in microseconds). The following ",
        '3' =>
        " procedure, when called with an integer ",
        '4' =>
        ", prints ",
        '5' =>
        " and checks to see if ",
        '6' =>
        " is prime. If it's prime, the procedure prints three asterisks followed by the amount of time used in performing the test.",
        '7' =>
        "Using this procedure, write a procedure ",
        '8' =>
        " that checks the primality of consecutive odd integers in a specified range. " .
        "Use your procedure to find the three smallest primes larger than 1000; larger than 10,000; larger than 100,000; larger than 1,000,000. " .
        "Note the time needed to test each prime. Since the testing algorithm has order of growth of Θ(√n), " .
        "you should expect that testing for primes around 10,000 should take about √10 times as long as testing for primes around 1000. " .
        "Do your timing data bear this out? How well do the data for 100,000 and 1,000,000 support the √n prediction? " .
        "Is your result compatible with the notion that programs on your machine run in time proportional to the number of steps required for the computation? ",
    ],
];
