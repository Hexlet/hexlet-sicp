<?php

return [
    'title' => 'Computing nth roots',
    'description' => [
        '1' =>
        "We saw in section 1.3.3 that attempting to compute square roots by naively finding a fixed point of ",
        '2' =>
        " does not converge, and that this can be fixed by average damping. The same method works for finding cube roots as fixed points of the average-damped ",
        '3' =>
        ". Unfortunately, the process does not work for fourth roots -- a single average damp is not enough to make a fixed-point search for ",
        '4' =>
        " converge. On the other hand, if we average damp twice (i.e., use the average damp of the average damp of ",
        '5' =>
        ") the fixed-point search does converge. Do some experiments to determine how many average damps are required to compute ",
        '6' =>
        "th roots as a fixed-point search based upon repeated average damping of ",
        '7' =>
        ". Use this to implement a simple procedure for computing ",
        '8' =>
        "th roots using ",
        '9' =>
        ", ",
        '10' =>
        ", and the ",
        '11' =>
        " procedure of exercise ",
        '12' =>
        ". Assume that any arithmetic operations you need are available as primitives.",
    ],
];
