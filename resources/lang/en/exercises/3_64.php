<?php

return [
    'title' => 'Stream-limit procedure',
    'description' => [
        '1' =>
        "Write a procedure ",
        '2' =>
        " that takes as arguments a stream and a number (the tolerance). " .
        "It should examine the stream until it finds two successive elements that differ in absolute value by less than the tolerance, and return the second of the two elements. " .
        "Using this, we could compute square roots up to a given tolerance by",
    ],
];
