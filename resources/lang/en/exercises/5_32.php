<?php

return [
    'title' => "Combinations whose operator is a symbol",
    'description' => [
        '1' =>
        "Using the ",
        '2' =>
        " mechanism, the compiler will avoid saving and restoring ",
        '3' =>
        " around the evaluation of the operator of a combination in the case where the operator is a symbol. " .
        "We could also build such optimizations into the evaluator. Indeed, the explicit-control evaluator of section 5.4 already performs a similar optimization, by treating combinations with no operands as a special case.",
        '4' =>
        "a. Extend the explicit-control evaluator to recognize as a separate class of expressions combinations whose operator is a symbol, and to take advantage of this fact in evaluating such expressions.",
        '5' =>
        "b. Alyssa P. Hacker suggests that by extending the evaluator to recognize more and more special cases we could incorporate all the compiler's optimizations, and that this would eliminate the advantage of compilation altogether. What do you think of this idea?",
    ],
];
