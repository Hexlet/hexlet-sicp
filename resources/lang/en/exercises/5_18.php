<?php

return [
    'title' => "Traced registers",
    'description' => [
        '1' =>
        "Modify the ",
        '2' =>
        " procedure of section 5.2.1 so that registers can be traced. Registers should accept messages that turn tracing on and off. " .
        "When a register is traced, assigning a value to the register should print the name of the register, the old contents of the register, and the new contents being assigned. Extend the interface to the machine model to permit you to turn tracing on and off for designated machine registers.",
    ],
];
