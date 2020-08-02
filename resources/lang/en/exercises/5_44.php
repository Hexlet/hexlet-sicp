<?php

return [
    'title' => "Modification of the open-coding compiler",
    'description' => [
        '1' =>
        "In this section we have focused on the use of the compile-time environment to produce lexical addresses. But there are other uses for compile-time environments. For instance, in exercise ",
        '2' =>
        " we increased the efficiency of compiled code by open-coding primitive procedures. Our implementation treated the names of open-coded procedures as reserved words. If a program were to rebind such a name, the mechanism described in exercise ",
        '3' =>
        " would still open-code it as a primitive, ignoring the new binding. For example, consider the procedure",
        '4' =>
        "which computes a linear combination of x and y. We might call it with arguments +matrix, *matrix, and four matrices, but the open-coding compiler would still open-code the + and the * in (+ (* a x) (* b y)) as primitive + and *. " .
        "Modify the open-coding compiler to consult the compile-time environment in order to compile the correct code for expressions involving the names of primitive procedures. (The code will work correctly as long as the program does not define or set! these names.)",
    ],
];
