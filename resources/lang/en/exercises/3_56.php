<?php

return [
    'title' => "Hamming's problem of number generation",
    'description' => [
        '1' =>
        "A famous problem, first raised by R. Hamming, is to enumerate, in ascending order with no repetitions, all positive integers with no prime factors other than 2, 3, or 5. " .
        "One obvious way to do this is to simply test each integer in turn to see whether it has any factors other than 2, 3, and 5. " .
        "But this is very inefficient, since, as the integers get larger, fewer and fewer of them fit the requirement. As an alternative, let us call the required stream of numbers S and notice the following facts about it.",
        '2' =>
        "• S begins with 1.",
        '3' =>
        "• The elements of (scale-stream S 2) are also elements of S.",
        '4' =>
        "• The same is true for (scale-stream S 3) and (scale-stream 5 S).",
        '5' =>
        "• These are all the elements of S.",
        '6' =>
        "Now all we have to do is combine elements from these sources. For this we define a procedure merge that combines two ordered streams into one ordered result stream, eliminating repetitions:",
        '7' =>
        "Then the required stream may be constructed with merge, as follows:",
        '8' =>
        "Fill in the missing expressions in the places marked <??> above.",
    ],
];
