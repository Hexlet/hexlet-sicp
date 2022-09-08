<?php

return [
    'title' => "Successive-merge procedure",
    'description' => [
        '1' =>
        "The following procedure takes as its argument a list of symbol-frequency pairs (where no symbol appears in more than one pair) and generates a Huffman encoding tree according to the Huffman algorithm.",
        '2' =>
        "",
        '3' =>
        " is the procedure given above that transforms the list of pairs into an ordered set of leaves. ",
        '4' =>
        " is the procedure you must write, using ",
        '5' =>
        " to successively merge the smallest-weight elements of the set until there is only one element left, which is the desired Huffman tree. " .
        "(This procedure is slightly tricky, but not really complicated. If you find yourself designing a complex procedure, then you are almost certainly doing something wrong. You can take significant advantage of the fact that we are using an ordered set representation.)",
    ],
];
