<?php

return [
    'title' => "Symbolic differentiation program with dispatching",
    'description' => [
        '1' =>
        "Section 2.3.2 described a program that performs symbolic differentiation:",
        '2' =>
        "We can regard this program as performing a dispatch on the type of the expression to be differentiated. " .
        "In this situation the ''type tag'' of the datum is the algebraic operator symbol (such as +) and the operation being performed is deriv. " .
        "We can transform this program into data-directed style by rewriting the basic derivative procedure as",
        '3' =>
        "a.  Explain what was done above. Why can't we assimilate the predicates number? and same-variable? into the data-directed dispatch?",
        '4' =>
        "b.  Write the procedures for derivatives of sums and products, and the auxiliary code required to install them in the table used by the program above.",
        '5' =>
        "c.  Choose any additional differentiation rule that you like, such as the one for exponents (exercise ",
        '6' =>
        "), and install it in this data-directed system.",
        '7' =>
        "d.  In this simple algebraic manipulator the type of an expression is the algebraic operator that binds it together. Suppose, however, we indexed the procedures in the opposite way, so that the dispatch line in deriv looked like",
        '8' =>
        "What corresponding changes to the derivative system are required?",
    ],
];
