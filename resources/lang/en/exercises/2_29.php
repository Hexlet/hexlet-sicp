<?php

return [
    'title' => 'Binary mobile',
    'description' => [
        '1' =>
        "A binary mobile consists of two branches, a left branch and a right branch. " .
        "Each branch is a rod of a certain length, from which hangs either a weight or another binary mobile. " .
        "We can represent a binary mobile using compound data by constructing it from two branches (for example, using ",
        '2' =>
        "):",
        '3' =>
        "A branch is constructed from a ",
        '4' =>
        " (which must be a number) together with a ",
        '5' =>
        ", which may be either a number (representing a simple weight) or another mobile:",
        '6' =>
        "a.  Write the corresponding selectors ",
        '7' =>
        " and ",
        '8' =>
        ", which return the branches of a mobile, and ",
        '9' =>
        " and ",
        '10' =>
        ", which return the components of a branch.",
        '11' =>
        "b.  Using your selectors, define a procedure ",
        '12' =>
        " that returns the total weight of a mobile.",
        '13' =>
        "c.  A mobile is said to be balanced if the torque applied by its top-left branch is equal to that applied by its top-right branch (that is, if the length of the left rod multiplied by the weight hanging from that rod is equal to the corresponding product for the right side) and if each of the submobiles hanging off its branches is balanced. " .
        "Design a predicate that tests whether a binary mobile is balanced.",
        '14' =>
        "d.  Suppose we change the representation of mobiles so that the constructors are",
        '15' =>
        "How much do you need to change your programs to convert to the new representation?",
    ],
];
