<?php

return [
    'title' => "The filtering in a ''delayed'' manner",
    'description' => [
        '1' =>
        "In section 4.4.3 we saw that ",
        '2' =>
        " and ",
        '3' =>
        " can cause the query language to give ''wrong'' answers if these filtering operations are applied to frames in which variables are unbound. " .
        "Devise a way to fix this shortcoming. One idea is to perform the filtering in a ''delayed'' manner by appending to the frame a ''promise'' to filter that is fulfilled only when enough variables have been bound to make the operation possible. " .
        "We could wait to perform filtering until all other operations have been performed. However, for efficiency's sake, we would like to perform filtering as soon as possible so as to cut down on the number of intermediate frames generated.",
    ],
];
