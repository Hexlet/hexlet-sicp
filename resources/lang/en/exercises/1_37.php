<?php

return [
    'title' => 'Finite continued fraction',
    'description' => [
        '1' =>
        "a. An infinite continued fraction is an expression of the form ",
        '2' =>
        "As an example, one can show that the infinite continued fraction expansion with the Ni and the Di all equal to 1 produces 1/φ, " .
        "where φ is the golden ratio (described in section 1.2.2). One way to approximate an infinite continued fraction is to truncate the expansion after a given number of terms. " .
        "Such a truncation -- a so-called k-term finite continued fraction -- has the form ",
        '3' =>
        "Suppose that n and d are procedures of one argument (the term index i) that return the Ni and Di of the terms of the continued fraction. " .
        "Define a procedure cont-frac such that evaluating (cont-frac n d k) computes the value of the k-term finite continued fraction. " .
        "Check your procedure by approximating 1/φ using ",
        '4' =>
        "or successive values of k. How large must you make k in order to get an approximation that is accurate to 4 decimal places?",
        '5' =>
        "b. If your cont-frac procedure generates a recursive process, write one that generates an iterative process. " .
        "If it generates an iterative process, write one that generates a recursive process. ",
    ],
];
