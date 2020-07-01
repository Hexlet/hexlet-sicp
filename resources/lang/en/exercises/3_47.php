<?php

return [
    'title' => "Implementations of semaphores",
    'description' => [
        '1' =>
        "A semaphore (of size n) is a generalization of a mutex. " .
        "Like a mutex, a semaphore supports acquire and release operations, but it is more general in that up to n processes can acquire it concurrently. " .
        "Additional processes that attempt to acquire the semaphore must wait for release operations. Give implementations of semaphores",
        '2' =>
        "a. in terms of mutexes",
        '3' =>
        "b. in terms of atomic test-and-set! operations."
    ]
];
