<?php

return [
    'title' => 'Working with sequences in the lazy evaluator',
    'description' => [
        '1' =>
        "Cy D. Fect, a reformed C programmer, is worried that some side effects may never take place, " .
        "because the lazy evaluator doesn't force the expressions in a sequence. Since the value of an expression " .
        "in a sequence other than the last one is not used (the expression is there only for its effect, such as " .
        "assigning to a variable or printing), there can be no subsequent use of this value (e.g., as an argument " .
        "to a primitive procedure) that will cause it to be forced. Cy thus thinks that when evaluating sequences, " .
        "we must force all expressions in the sequence except the final one. He proposes to modify ",
        '2' =>
        " from section 4.1.1 to use ",
        '3' =>
        " rather than ",
        '4' =>
        ":",
        '5' =>
        "a. Ben Bitdiddle thinks Cy is wrong. He shows Cy the ",
        '6' =>
        " procedure described in exercise ",
        '7' =>
        " which gives an important example of a sequence with side effects:",
        '8' =>
        "He claims that the evaluator in the text (with the original ",
        '9' =>
        ") handles this correctly:",
        '10' =>
        "Explain why Ben is right about the behavior of ",
        '11' =>
        ".",
        '12' =>
        "b. Cy agrees that Ben is right about the ",
        '13' =>
        " example, but says that that's not the kind of program he was thinking about when he proposed his change to ",
        '14' =>
        ". He defines the following two procedures in the lazy evaluator:",
        '15' =>
        "What are the values of ",
        '16' =>
        " and ",
        '17' =>
        " with the original ",
        '18' =>
        "? What would the values be with Cy's proposed changes?",
        '19' =>
        "c. Cy also points out that changing ",
        '20' =>
        " as he proposes does not affect the behavior of the example in part a. Explain why this is true.",
        '21' =>
        "d. How do you think sequences ought to be treated in the lazy evaluator? Do you like Cy's " .
        "approach, the approach in the text, or some other approach?",
    ],
];
