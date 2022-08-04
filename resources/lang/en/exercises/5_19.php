<?php

return [
    'title' => "A breakpoint feature",
    'description' => [
        '1' =>
        "Alyssa P. Hacker wants a breakpoint feature in the simulator to help her debug her machine designs. You have been hired to install this feature for her. " .
        "She wants to be able to specify a place in the controller sequence where the simulator will stop and allow her to examine the state of the machine. You are to implement a procedure",
        '2' =>
        "that sets a breakpoint just before the ",
        '3' =>
        "th instruction after the given label. For example,",
        '4' =>
        "installs a breakpoint in ",
        '5' =>
        " just before the assignment to register ",
        '6' =>
        ". When the simulator reaches the breakpoint it should print the label and the offset of the breakpoint and stop executing instructions. Alyssa can then use ",
        '7' =>
        " and ",
        '8' =>
        " to manipulate the state of the simulated machine. She should then be able to continue execution by saying",
        '9' =>
        "She should also be able to remove a specific breakpoint by means of",
        '10' =>
        "or to remove all breakpoints by means of",
    ],
];
