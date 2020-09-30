<?php

return [
    'title' => "The number of pushes and the maximum stack depth required to compute n!",
    'description' => [
        '1' =>
        "Measure the number of pushes and the maximum stack depth required to compute n! for various small values of n using the factorial machine shown in figure 5.11. " .
        "From your data determine formulas in terms of n for the total number of push operations and the maximum stack depth used in computing n! for any n > 1. Note that each of these is a linear function of n and is thus determined by two constants. " .
        "In order to get the statistics printed, you will have to augment the factorial machine with instructions to initialize the stack and print the statistics. " .
        "You may want to also modify the machine so that it repeatedly reads a value for n, computes the factorial, and prints the result (as we did for the GCD machine in figure 5.4), so that you will not have to repeatedly invoke get-register-contents, set-register-contents!, and start.",
        '2' =>
        "Figure 5.4:  A GCD machine that reads inputs and prints results.",
        '3' =>
        "Figure 5.11:  A recursive factorial machine.",
    ],
];
