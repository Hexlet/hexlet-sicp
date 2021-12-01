<?php

return [
    'title' => "Separate processing the two clauses of the 'and'",
    'description' => [
        '1' =>
        "Our implementation of ",
        '2' =>
        " as a series combination of queries (figure 4.5) is elegant, but it is inefficient because in processing the second query of the and we must scan the data base for each frame produced by the first query. " .
        "If the data base has ",
        '3' =>
        " elements, and a typical query produces a number of output frames proportional to ",
        '4' =>
        " (say ",
        '5' =>
        "), then scanning the data base for each frame produced by the first query will require ",
        '6' =>
        " calls to the pattern matcher. Another approach would be to process the two clauses of the ",
        '7' =>
        " separately, then look for all pairs of output frames that are compatible. If each query produces ",
        '8' =>
        " output frames, then this means that we must perform ",
        '9' =>
        " compatibility checks -- a factor of ",
        '10' =>
        " fewer than the number of matches required in our current method.",
        '11' =>
        "Devise an implementation of ",
        '12' =>
        " that uses this strategy. " .
        "You must implement a procedure that takes two frames as inputs, checks whether the bindings in the frames are compatible, and, if so, produces a frame that merges the two sets of bindings. This operation is similar to unification.",
        '13' =>
        "Figure 4.5:  The and combination of two queries is produced by operating on the stream of frames in series.",
    ],
];
