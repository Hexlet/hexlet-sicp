<?php

return [
    'title' => "A new special form - unique",
    'description' => [
        '1' =>
        "Implement for the query language a new special form called ",
        '2' =>
        ". ",
        '3' =>
        " should succeed if there is precisely one item in the data base satisfying a specified query. For example,",
        '4' =>
        "should print the one-item stream",
        '5' =>
        "since Ben is the only computer wizard, and",
        '6' =>
        "should print the empty stream, since there is more than one computer programmer. Moreover,",
        '7' =>
        "should list all the jobs that are filled by only one person, and the people who fill them.",
        '8' =>
        "There are two parts to implementing ",
        '9' =>
        ". The first is to write a procedure that handles this special form, and the second is to make ",
        '10' =>
        " dispatch to that procedure. The second part is trivial, since ",
        '11' =>
        " does its dispatching in a data-directed way. If your procedure is called ",
        '12' =>
        ", all you need to do is",
        '13' =>
        "and ",
        '14' =>
        " will dispatch to this procedure for every query whose ",
        '15' =>
        " is the symbol ",
        '16' =>
        ".",
        '17' =>
        "The real problem is to write the procedure ",
        '18' =>
        ". This should take as input the ",
        '19' =>
        " of the ",
        '20' =>
        " query, together with a stream of frames. For each frame in the stream, it should use ",
        '21' =>
        " to find the stream of all extensions to the frame that satisfy the given query. " .
        "Any stream that does not have exactly one item in it should be eliminated. The remaining streams should be passed back to be accumulated into one big stream that is the result of the ",
        '22' =>
        " query. This is similar to the implementation of the ",
        '23' =>
        " special form.",
        '24' =>
        "Test your implementation by forming a query that lists all people who supervise precisely one person.",
    ],
];
