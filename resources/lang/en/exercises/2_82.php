<?php

return [
    'title' => 'Coercion in the general case of multiple arguments',
    'description' => [
        '1' =>
        "Show how to generalize ",
        '2' =>
        " to handle coercion in the general case of multiple arguments. " .
        "One strategy is to attempt to coerce all the arguments to the type of the first argument, then to the type of the second argument, and so on. " .
        "Give an example of a situation where this strategy (and likewise the two-argument version given above) is not sufficiently general. " .
        "(Hint: Consider the case where there are some suitable mixed-type operations present in the table that will not be tried.)",
    ],
];
