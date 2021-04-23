<?php

return [
    'title' => 'Church numerals',
    'description' => [
        '1' =>
        "In case representing pairs as procedures wasn't mind-boggling enough, consider that, in a language that can manipulate procedures, we can get by without numbers (at least insofar as nonnegative integers are concerned) by implementing 0 and the operation of adding 1 as",
        '2' =>
        "This representation is known as Church numerals, after its inventor, Alonzo Church, the logician who invented the λ calculus.",
        '3' =>
        "Define one and two directly (not in terms of zero and add-1). " .
        "(Hint: Use substitution to evaluate (add-1 zero)). " .
        "Give a direct definition of the addition procedure + (add) (not in terms of repeated application of add-1).",
    ],
];
