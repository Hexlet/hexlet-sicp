<?php

return [
    'title' => 'Working with sequences in the lazy evaluator',
    'description' => [
        '1' => "Cy D. Fect, a reformed C programmer, is worried that some side effects may never take place, " .
        "because the lazy evaluator doesn't force the expressions in a sequence. Since the value of an expression " .
        "in a sequence other than the last one is not used (the expression is there only for its effect, such as " .
        "assigning to a variable or printing), there can be no subsequent use of this value (e.g., as an argument " .
        "to a primitive procedure) that will cause it to be forced. Cy thus thinks that when evaluating sequences, " .
        "we must force all expressions in the sequence except the final one. He proposes to modify eval-sequence " .
        "from section 4.1.1 to use actual-value rather than eval:",
        '2' => "a. Ben Bitdiddle thinks Cy is wrong. He shows Cy the for-each procedure described in exercise ",
        '3' => " which gives an important example of a sequence with side effects:",
        '4' => "He claims that the evaluator in the text (with the original eval-sequence) handles this correctly:",
        '5' => "Explain why Ben is right about the behavior of for-each.",
        '6' => "b. Cy agrees that Ben is right about the for-each example, but says that that's not the kind of " .
        "program he was thinking about when he proposed his change to eval-sequence. He defines the following " .
        "two procedures in the lazy evaluator:",
        '7' => "What are the values of (p1 1) and (p2 1) with the original eval-sequence? What would the values " .
        "be with Cy's proposed change to eval-sequence?",
        '8' => "c. Cy also points out that changing eval-sequence as he proposes does not affect the behavior of " .
        "the example in part a. Explain why this is true.",
        '9' => "d. How do you think sequences ought to be treated in the lazy evaluator? Do you like Cy's " .
        "approach, the approach in the text, or some other approach?",
    ],
];
