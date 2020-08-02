<?php

return [
    'title' => 'Let*',
    'description' => [
        '1' => "Let* is similar to let, except that the bindings of the let variables are performed sequentially " .
        "from left to right, and each binding is made in an environment in which all of the preceding bindings " .
        "are visible. For example",
        '2' => "returns 39. Explain how a let* expression can be rewritten as a set of nested let expressions, and " .
        "write a procedure let*->nested-lets that performs this transformation. If we have already implemented let " .
        "(exercise 4.6) and we want to extend the evaluator to handle let*, is it sufficient to add a clause to " .
        "eval whose action is",
        '3' => "or must we explicitly expand let* in terms of non-derived expressions?",
    ],
];
