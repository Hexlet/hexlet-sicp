<?php

return [
    'title' => "A rule-application method that uses environments",
    'description' => [
        '1' =>
        "When we implemented the Lisp evaluator in section 4.1, we saw how to use local environments to avoid name conflicts between the parameters of procedures. For example, in evaluating",
        '2' =>
        "there is no confusion between the ",
        '3' =>
        " in ",
        '4' =>
        " and the ",
        '5' =>
        " in ",
        '6' =>
        ", because we evaluate the body of each procedure in an environment that is specially constructed to contain bindings for the local variables. " .
        "In the query system, we used a different strategy to avoid name conflicts in applying rules. Each time we apply a rule we rename the variables with new names that are guaranteed to be unique. " .
        "The analogous strategy for the Lisp evaluator would be to do away with local environments and simply rename the variables in the body of a procedure each time we apply the procedure.",
        '7' =>
        "Implement for the query language a rule-application method that uses environments rather than renaming. " .
        "See if you can build on your environment structure to create constructs in the query language for dealing with large systems, such as the rule analog of block-structured procedures. " .
        "Can you relate any of this to the problem of making deductions in a context (e.g., ''If I supposed that P were true, then I would be able to deduce A and B.'') as a method of problem solving? " .
        "(This problem is open-ended. A good answer is probably worth a Ph.D.)",
    ],
];
