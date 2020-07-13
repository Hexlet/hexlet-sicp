<?php

return [
    'title' => "A new special form - unique",
    'description' => [
        '1' =>
        "Implement for the query language a new special form called unique. Unique should succeed if there is precisely one item in the data base satisfying a specified query. For example,",
        '2' =>
        "should print the one-item stream",
        '3' =>
        "since Ben is the only computer wizard, and",
        '4' =>
        "should print the empty stream, since there is more than one computer programmer. Moreover,",
        '5' =>
        "should list all the jobs that are filled by only one person, and the people who fill them.",
        '6' =>
        "There are two parts to implementing unique. The first is to write a procedure that handles this special form, and the second is to make qeval dispatch to that procedure. The second part is trivial, since qeval does its dispatching in a data-directed way. If your procedure is called uniquely-asserted, all you need to do is",
        '7' =>
        "and qeval will dispatch to this procedure for every query whose type (car) is the symbol unique.",
        '8' =>
        "The real problem is to write the procedure uniquely-asserted. This should take as input the contents (cdr) of the unique query, together with a stream of frames. " .
        "For each frame in the stream, it should use qeval to find the stream of all extensions to the frame that satisfy the given query. " .
        "Any stream that does not have exactly one item in it should be eliminated. The remaining streams should be passed back to be accumulated into one big stream that is the result of the unique query. This is similar to the implementation of the not special form.",
        '9' =>
        "Test your implementation by forming a query that lists all people who supervise precisely one person."
    ]
];
