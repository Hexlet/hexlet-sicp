<?php

return [
    'title' => 'Change coins of different currencies',
    'description' => [
        '1' =>
        "Consider the change-counting program of section 1.2.2. " .
        "It would be nice to be able to easily change the currency used by the program, so that we could compute the number of ways to change a British pound, for example. " .
        "As the program is written, the knowledge of the currency is distributed partly into the procedure ",
        '2' =>
        " and partly into the procedure ",
        '3' =>
        " (which knows that there are five kinds of U.S. coins). It would be nicer to be able to supply a list of coins to be used for making change.",
        '4' =>
        "We want to rewrite the procedure ",
        '5' =>
        " so that its second argument is a list of the values of the coins to use rather than an integer specifying which coins to use. " .
        "We could then have lists that defined each kind of currency:",
        '6' =>
        "We could then call ",
        '7' =>
        " as follows:",
        '8' =>
        "To do this will require changing the program ",
        '9' =>
        " somewhat. It will still have the same form, but it will access its second argument differently, as follows:",
        '10' =>
        "Define the procedures ",
        '11' =>
        ", ",
        '12' =>
        ", and ",
        '13' =>
        " in terms of primitive operations on list structures. Does the order of the list ",
        '14' =>
        " affect the answer produced by ",
        '15' =>
        "? Why or why not?",
    ],
];
