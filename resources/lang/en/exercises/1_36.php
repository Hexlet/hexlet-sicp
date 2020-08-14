<?php

return [
    'title' => 'Fixed point',
    'description' => [
        '1' =>
        "Modify fixed-point so that it prints the sequence of approximations it generates, using the newline and display primitives shown in exercise  ",
        '2' =>
        ". Then find a solution to x^x = 1000 by finding a fixed point of x → log(1000)/log(x). (Use Scheme's primitive log procedure, which computes natural logarithms.) " .
        "Compare the number of steps this takes with and without average damping. (Note that you cannot start fixed-point with a guess of 1, as this would cause division by log(1) = 0.) ",
    ],
];
