<?php

return [
    'title' => "Signal smoothing",
    'description' => [
        '1' =>
        "Unfortunately, Alyssa's zero-crossing detector in exercise ",
        '2' =>
        " proves to be insufficient, because the noisy signal from the sensor leads to spurious zero crossings. " .
        "Lem E. Tweakit, a hardware specialist, suggests that Alyssa smooth the signal to filter out the noise before extracting the zero crossings. " .
        "Alyssa takes his advice and decides to extract the zero crossings from the signal constructed by averaging each value of the sense data with the previous value. " .
        "She explains the problem to her assistant, Louis Reasoner, who attempts to implement the idea, altering Alyssa's program as follows:",
        '3' =>
        "This does not correctly implement Alyssa's plan. Find the bug that Louis has installed and fix it without changing the structure of the program. " .
        "(Hint: You will need to increase the number of arguments to ",
        '4' =>
        ".)",
    ],
];
