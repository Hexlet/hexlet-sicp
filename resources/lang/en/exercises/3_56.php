<?php

return [
    'title' => "Hamming's problem of number generation",
    'description' => [
        '1' =>
        "A famous problem, first raised by R. Hamming, is to enumerate, in ascending order with no repetitions, all positive integers with no prime factors other than ",
        '2' =>
        ", or ",
        '3' =>
        ". One obvious way to do this is to simply test each integer in turn to see whether it has any factors other than ",
        '4' =>
        ", and ",
        '5' =>
        ". But this is very inefficient, since, as the integers get larger, fewer and fewer of them fit the requirement. As an alternative, let us call the required stream of numbers ",
        '6' =>
        " and notice the following facts about it.",
        '7' =>
        "• ",
        '8' =>
        " begins with ",
        '9' =>
        ".",
        '10' =>
        "• The elements of ",
        '11' =>
        " are also elements of ",
        '12' =>
        ".",
        '13' =>
        "• The same is true for ",
        '14' =>
        " and ",
        '15' =>
        ".",
        '16' =>
        "• These are all the elements of ",
        '17' =>
        ".",
        '18' =>
        "Now all we have to do is combine elements from these sources. For this we define a procedure ",
        '19' =>
        " that combines two ordered streams into one ordered result stream, eliminating repetitions:",
        '20' =>
        "Then the required stream may be constructed with ",
        '21' =>
        ", as follows:",
        '22' =>
        "Fill in the missing expressions in the places marked ",
        '23' =>
        " above.",
    ],
];
