<?php

return [
    'title' => "Symbolic differentiation program with dispatching",
    'description' => [
        '1' =>
        "Section 2.3.2 described a program that performs symbolic differentiation:",
        '2' =>
        "We can regard this program as performing a dispatch on the type of the expression to be differentiated. " .
        "In this situation the ''type tag'' of the datum is the algebraic operator symbol (such as ",
        '3' =>
        ") and the operation being performed is ",
        '4' =>
        ". We can transform this program into data-directed style by rewriting the basic derivative procedure as",
        '5' =>
        "a.  Explain what was done above. Why can't we assimilate the predicates ",
        '6' =>
        " and ",
        '7' =>
        " into the data-directed dispatch?",
        '8' =>
        "b.  Write the procedures for derivatives of sums and products, and the auxiliary code required to install them in the table used by the program above.",
        '9' =>
        "c.  Choose any additional differentiation rule that you like, such as the one for exponents (exercise ",
        '10' =>
        "), and install it in this data-directed system.",
        '11' =>
        "d.  In this simple algebraic manipulator the type of an expression is the algebraic operator that binds it together. Suppose, however, we indexed the procedures in the opposite way, so that the dispatch line in ",
        '12' =>
        " looked like",
        '13' =>
        "What corresponding changes to the derivative system are required?",
    ],
];
