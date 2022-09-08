<?php

return [
    'title' => 'Dotted-tail notation',
    'description' => [
        '1' =>
        "The procedures ",
        '2' =>
        ", ",
        '3' =>
        " and ",
        '4' =>
        " take arbitrary numbers of arguments. One way to define such procedures is to use define with dotted-tail notation. " .
        "In a procedure definition, a parameter list that has a dot before the last parameter name indicates that, when the procedure is called, the initial parameters (if any) will have as values the initial arguments, as usual, but the final parameter's value will be a list of any remaining arguments. " .
        "For instance, given the definition",
        '5' =>
        "the procedure ",
        '6' =>
        " can be called with two or more arguments. If we evaluate",
        '7' =>
        "then in the body of ",
        '8' =>
        ", ",
        '9' =>
        " will be ",
        '10' =>
        ", ",
        '11' =>
        " will be ",
        '12' =>
        ", and ",
        '13' =>
        " will be the list ",
        '14' =>
        ". Given the definition",
        '15' =>
        "the procedure ",
        '16' =>
        " can be called with zero or more arguments. If we evaluate",
        '17' =>
        "then in the body of ",
        '18' =>
        ", ",
        '19' =>
        " will be the list ",
        '20' =>
        ".",
        '21' =>
        "Use this notation to write a procedure ",
        '22' =>
        " that takes one or more integers and returns a list of all the arguments that have the same even-odd parity as the first argument. For example,",
    ],
];
