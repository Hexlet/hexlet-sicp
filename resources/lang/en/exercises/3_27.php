<?php

return [
    'title' => "Memoization",
    'description' => [
        '1' =>
        "Memoization (also called tabulation) is a technique that enables a procedure to record, in a local table, values that have previously been computed. " .
        "This technique can make a vast difference in the performance of a program. " .
        "A memoized procedure maintains a table in which values of previous calls are stored using as keys the arguments that produced the values. " .
        "When the memoized procedure is asked to compute a value, it first checks the table to see if the value is already there and, if so, just returns that value. " .
        "Otherwise, it computes the new value in the ordinary way and stores this in the table. As an example of memoization, recall from section 1.2.2 the exponential process for computing Fibonacci numbers:",
        '2' =>
        "The memoized version of the same procedure is",
        '3' =>
        "where the memoizer is defined as",
        '4' =>
        "Draw an environment diagram to analyze the computation of (memo-fib 3). Explain why memo-fib computes the nth Fibonacci number in a number of steps proportional to n. Would the scheme still work if we had simply defined memo-fib to be (memoize fib)?",
    ],
];
