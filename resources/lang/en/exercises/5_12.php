<?php

return [
    'title' => "Extend the assembler",
    'description' => [
        '1' => "The simulator can be used to help determine the data paths required for implementing a machine " .
        "with a given controller. Extend the assembler to store the following information in the machine model:",
        '2' => "a list of all instructions, with duplicates removed, sorted by instruction type (assign, goto, " .
        "and so on);",
        '3' => "a list (without duplicates) of the registers used to hold entry points (these are the registers " .
        "referenced by goto instructions);",
        '4' => "a list (without duplicates) of the registers that are saved or restored;",
        '5' => "for each register, a list (without duplicates) of the sources from which it is assigned (for " .
        "example, the sources for register val in the factorial machine of figure 5.11 are (const 1) and ((op *) " .
        "(reg n) (reg val))).",
        '6' => "Extend the message-passing interface to the machine to provide access to this new information. To " .
        "test your analyzer, define the Fibonacci machine from figure 5.12 and examine the lists you constructed.",
    ],
];
