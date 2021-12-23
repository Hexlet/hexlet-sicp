<?php

return [
    'title' => "Modifying evaluator",
    'description' => [
        '1' =>
        "This section described how to modify the explicit-control evaluator so that interpreted code can call compiled procedures. " .
        "Show how to modify the compiler so that compiled procedures can call not only primitive procedures and compiled procedures, but interpreted procedures as well. " .
        "This requires modifying ",
        '2' =>
        " to handle the case of compound (interpreted) procedures. Be sure to handle all the same ",
        '3' =>
        " and ",
        '4' =>
        " combinations as in ",
        '5' =>
        ". To do the actual procedure application, the code needs to jump to the evaluator’s ",
        '6' =>
        " entry point. This label cannot be directly referenced in object code (since the assembler requires that all labels referenced by the code it is assembling be defined there), so we will add a register called ",
        '7' =>
        " to the evaluator machine to hold this entry point, and add an instruction to initialize it:",
        '8' =>
        "To test your code, start by defining a procedure ",
        '9' =>
        " that calls a procedure ",
        '10' =>
        ". Use ",
        '11' =>
        " to compile the definition of ",
        '12' =>
        " and start the evaluator. Now, typing at the evaluator, define ",
        '13' =>
        " and try to call ",
        '14' =>
        ".",
    ],
];
