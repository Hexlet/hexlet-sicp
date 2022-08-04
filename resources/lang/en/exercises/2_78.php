<?php

return [
    'title' => "Scheme's internal type system",
    'description' => [
        '1' =>
        "The internal procedures in the ",
        '2' =>
        " package are essentially nothing more than calls to the primitive procedures ",
        '3' =>
        ", ",
        '4' =>
        ", etc. It was not possible to use the primitives of the language directly because our type-tag system requires that each data object have a type attached to it. " .
        "In fact, however, all Lisp implementations do have a type system, which they use internally. Primitive predicates such as ",
        '5' =>
        " and ",
        '6' =>
        " determine whether data objects have particular types. Modify the definitions of ",
        '7' =>
        ", ",
        '8' =>
        ", and ",
        '9' =>
        " from section 2.4.2 so that our generic system takes advantage of Scheme's internal type system. " .
        "That is to say, the system should work as before except that ordinary numbers should be represented simply as Scheme numbers rather than as pairs whose car is the symbol ",
        '10' =>
        ".",
    ],
];
