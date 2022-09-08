<?php

return [
    'title' => "Extend the assembler",
    'description' => [
        '1' =>
        "The simulator can be used to help determine the data paths required for implementing a machine " .
        "with a given controller. Extend the assembler to store the following information in the machine model:",
        '2' =>
        "a list of all instructions, with duplicates removed, sorted by instruction type (",
        '3' =>
        ", ",
        '4' =>
        ", and so on);",
        '5' =>
        "a list (without duplicates) of the registers used to hold entry points (these are the registers referenced by ",
        '6' =>
        " instructions);",
        '7' =>
        "a list (without duplicates) of the registers that are ",
        '8' =>
        "d or ",
        '9' =>
        "d;",
        '10' =>
        "for each register, a list (without duplicates) of the sources from which it is assigned (for example, the sources for register ",
        '11' =>
        " in the factorial machine of figure 5.11 are ",
        '12' =>
        " and ",
        '13' =>
        ").",
        '14' =>
        "Extend the message-passing interface to the machine to provide access to this new information. To " .
        "test your analyzer, define the Fibonacci machine from figure 5.12 and examine the lists you constructed.",
        '15' =>
        "Figure 5.11:  A recursive factorial machine.",
        '16' =>
        "Figure 5.12:  Controller for a machine to compute Fibonacci numbers.",
    ],
];
