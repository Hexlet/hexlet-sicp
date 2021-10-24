<?php

return [
    'title' => "Weighting function",
    'description' => [
        '1' =>
        "It would be nice to be able to generate streams in which the pairs appear in some useful order, rather than in the order that results from an ad hoc interleaving process. " .
        "We can use a technique similar to the ",
        '2' =>
        " procedure of exercise ",
        '3' =>
        ", if we define a way to say that one pair of integers is ''less than'' another. One way to do this is to define a ''weighting function'' ",
        '4' =>
        " and stipulate that ",
        '5' =>
        " is less than ",
        '6' =>
        " if ",
        '7' =>
        ". Write a procedure ",
        '8' =>
        " that is like ",
        '9' =>
        ", except that it takes an additional argument ",
        '10' =>
        ", which is a procedure that computes the weight of a pair, and is used to determine the order in which elements should appear in the resulting merged stream. Using ",
        '11' =>
        ", generalize pairs to a procedure ",
        '12' =>
        " that takes two streams, together with a procedure that computes a weighting function, and generates the stream of ",
        '13' =>
        ", ordered according to weight. Use your procedure to generate",
        '14' =>
        "a. the stream of all pairs of positive integers ",
        '15' =>
        " with ",
        '16' =>
        " ordered according to the sum ",
        '17' =>
        ".",
        '18' =>
        "b. the stream of all pairs of positive integers ",
        '19' =>
        " with ",
        '20' =>
        ", where neither ",
        '21' =>
        " nor ",
        '22' =>
        " is divisible by ",
        '23' =>
        ", ",
        '24' =>
        ", or ",
        '25' =>
        ", and the pairs are ordered according to the sum ",
        '26' =>
        ".",
    ],
];
