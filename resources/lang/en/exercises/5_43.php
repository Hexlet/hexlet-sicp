<?php

return [
    'title' => "The compiler and internal definitions",
    'description' => [
        '1' =>
        "We argued in section 4.1.6 that internal definitions for block structure should not be considered ''real'' ",
        '2' =>
        "s. Rather, a procedure body should be interpreted as if the internal variables being ",
        '3' =>
        "d were installed as ordinary ",
        '4' =>
        " variables initialized to their correct values using ",
        '5' =>
        ". Section 4.1.6 and exercise ",
        '6' =>
        " showed how to modify the metacircular interpreter to accomplish this by scanning out internal definitions. Modify the compiler to perform the same transformation before it compiles a procedure body.",
    ],
];
