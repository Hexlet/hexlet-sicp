<?php

return [
    'title' => "Machine registers determination",
     'description' => [
        '1' =>
        "Modify the simulator so that it uses the controller sequence to determine what registers the machine has rather than requiring a list of registers as an argument to ",
        '2' =>
        ". Instead of pre-allocating the registers in ",
        '3' =>
        ", you can allocate them one at a time when they are first seen during assembly of the instructions.",
    ],
];
