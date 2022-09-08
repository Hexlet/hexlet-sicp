<?php

return [
    'title' => "The number of pushes and the maximum stack depth required to compute n!",
    'description' => [
        '1' =>
        "Measure the number of pushes and the maximum stack depth required to compute ",
        '2' =>
        " for various small values of ",
        '3' =>
        " using the factorial machine shown in figure 5.11. From your data determine formulas in terms of ",
        '4' =>
        " for the total number of push operations and the maximum stack depth used in computing ",
        '5' =>
        " for any ",
        '6' =>
        ". Note that each of these is a linear function of ",
        '7' =>
        " and is thus determined by two constants. In order to get the statistics printed, you will have to augment the factorial machine with instructions to initialize the stack and print the statistics. " .
        "You may want to also modify the machine so that it repeatedly reads a value for ",
        '8' =>
        ", computes the factorial, and prints the result (as we did for the GCD machine in figure 5.4), so that you will not have to repeatedly invoke ",
        '9' =>
        ", ",
        '10' =>
        ", and ",
        '11' =>
        ".",
        '12' =>
        "Figure 5.4:  A GCD machine that reads inputs and prints results.",
        '13' =>
        "Figure 5.11:  A recursive factorial machine.",
    ],
];
