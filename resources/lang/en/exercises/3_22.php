<?php

return [
    'title' => "A queue as a procedure with local state",
    'description' => [
        '1' =>
        "Instead of representing a queue as a pair of pointers, we can build a queue as a procedure with local state. The local state will consist of pointers to the beginning and the end of an ordinary list. Thus, the make-queue procedure will have the form",
        '2' =>
        "Complete the definition of make-queue and provide implementations of the queue operations using this representation."
    ]
];
