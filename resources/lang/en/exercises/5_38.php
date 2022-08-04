<?php

return [
    'title' => "Support open coding of selected primitives",
    'description' => [
        '1' =>
        "Our compiler is clever about avoiding unnecessary stack operations, but it is not clever at all when it comes to compiling calls to the primitive procedures of the language in terms of the primitive operations supplied by the machine. " .
        "For example, consider how much code is compiled to compute ",
        '2' =>
        ": The code sets up an argument list in ",
        '3' =>
        ", puts the primitive addition procedure (which it finds by looking up the symbol ",
        '4' =>
        " in the environment) into ",
        '5' =>
        ", and tests whether the procedure is primitive or compound. " .
        "The compiler always generates code to perform the test, as well as code for primitive and compound branches (only one of which will be executed). We have not shown the part of the controller that implements primitives, but we presume that these instructions make use of primitive arithmetic operations in the machine's data paths. " .
        "Consider how much less code would be generated if the compiler could open-code primitives -- that is, if it could generate code to directly use these primitive machine operations. The expression ",
        '6' =>
        " might be compiled into something as simple as",
        '7' =>
        "In this exercise we will extend our compiler to support open coding of selected primitives. Special-purpose code will be generated for calls to these primitive procedures instead of the general procedure-application code. " .
        "In order to support this, we will augment our machine with special argument registers ",
        '8' =>
        " and ",
        '9' =>
        ". The primitive arithmetic operations of the machine will take their inputs from ",
        '10' =>
        " and ",
        '11' =>
        ". The results may be put into ",
        '12' =>
        ", ",
        '13' =>
        ", or ",
        '14' =>
        ".",
        '15' =>
        "The compiler must be able to recognize the application of an open-coded primitive in the source program. We will augment the dispatch in the ",
        '16' =>
        " procedure to recognize the names of these primitives in addition to the reserved words (the special forms) it currently recognizes. " .
        "For each special form our compiler has a code generator. In this exercise we will construct a family of code generators for the open-coded primitives.",
        '17' =>
        "a.  The open-coded primitives, unlike the special forms, all need their operands evaluated. Write a code generator ",
        '18' =>
        " for use by all the open-coding code generators. ",
        '19' =>
        " should take an operand list and compile the given operands targeted to successive argument registers. Note that an operand may contain a call to an open-coded primitive, so argument registers will have to be preserved during operand evaluation.",
        '20' =>
        "b.  For each of the primitive procedures ",
        '21' =>
        ", ",
        '22' =>
        ", ",
        '23' =>
        ", and ",
        '24' =>
        ", write a code generator that takes a combination with that operator, together with a target and a linkage descriptor, and produces code to spread the arguments into the registers and then perform the operation targeted to the given target with the given linkage. " .
        "You need only handle expressions with two operands. Make ",
        '25' =>
        " dispatch to these code generators.",
        '26' =>
        "c.  Try your new compiler on the ",
        '27' =>
        " example. Compare the resulting code with the result produced without open coding.",
        '28' =>
        "d.  Extend your code generators for ",
        '29' =>
        " and ",
        '30' =>
        " so that they can handle expressions with arbitrary numbers of operands. An expression with more than two operands will have to be compiled into a sequence of operations, each with only two inputs.",
    ],
];
