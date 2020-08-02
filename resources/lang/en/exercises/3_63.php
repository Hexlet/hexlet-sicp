<?php

return [
    'title' => "Efficient of the sqrt-stream procedure",
    'description' => [
        '1' =>
        "Louis Reasoner asks why the sqrt-stream procedure was not written in the following more straightforward way, without the local variable guesses:",
        '2' =>
        "Alyssa P. Hacker replies that this version of the procedure is considerably less efficient because it performs redundant computation. Explain Alyssa's answer. " .
        "Would the two versions still differ in efficiency if our implementation of delay used only (lambda () <exp>) without using the optimization provided by memo-proc (section 3.5.1)?",
    ],
];
