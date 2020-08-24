<?php

return [
    'title' => 'A table constructor make-table',
    'description' => [
        '1' =>
        "In the table implementations above, the keys are tested for equality using ",
        '2' =>
        "(called by ",
        '3' =>
        " This is not always the appropriate test. " .
        "For instance, we might have a table with numeric keys in which we don't need an exact match to the number we're looking up, " .
        "but only a number within some tolerance of it. " .
        "Design a table constructor ",
        '4' =>
        "that takes as an argument a ",
        '5' =>
        "procedure that will be used to test ''equality'' of keys. ",
        '6' =>
        "should return a ",
        '7' =>
        "procedure that can be used to access appropriate ",
        '8' =>
        "and",
        '9' =>
        "procedures for a local table.",
    ],
];
