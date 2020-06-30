<?php

return [
    'title' => "The value of sum",
    'description' => [
        '1' =>
        "Consider the sequence of expressions",
        '2' =>
        "What is the value of sum after each of the above expressions is evaluated? What is the printed response to evaluating the stream-ref and display-stream expressions? " .
        "Would these responses differ if we had implemented (delay <exp>) simply as (lambda () <exp>) without using the optimization provided by memo-proc ? Explain."
    ]
];
