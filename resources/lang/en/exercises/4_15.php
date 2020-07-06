<?php

return [
    'title' => 'Show that it is impossible to write a procedure halts?',
    'description' => [
        '1' => "Given a one-argument procedure p and an object a, p is said to ``halt'' on a if evaluating " .
        "the expression (p a) returns a value (as opposed to terminating with an error message or running " .
        "forever). Show that it is impossible to write a procedure halts? that correctly determines whether " .
        "p halts on a for any procedure p and object a. Use the following reasoning: If you had such a " .
        "procedure halts?, you could implement the following program:",
        '2' => "Now consider evaluating the expression (try try) and show that any possible outcome (either " .
        "halting or running forever) violates the intended behavior of halts?."
    ]
];
