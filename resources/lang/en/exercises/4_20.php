<?php

return [
    'title' => 'Special form of letrec',
    'description' => [
        '1' =>
        "Because internal definitions look sequential but are actually simultaneous, some people " .
        "prefer to avoid them entirely, and use the special form ",
        '2' =>
        " instead. ",
        '3' =>
        " looks like ",
        '4' =>
        ", so it is not surprising that the variables it binds are bound simultaneously and have the same scope " .
        "as each other. The sample procedure ",
        '5' =>
        " above can be written without internal definitions, but with exactly the same meaning, as",
        '6' =>
        "",
        '7' =>
        " expressions, which have the form",
        '8' =>
        "are a variation on ",
        '9' =>
        " in which the expressions ",
        '10' =>
        " that provide the initial values for the variables ",
        '11' =>
        " are evaluated in an environment that includes all the ",
        '12' =>
        " bindings. This permits recursion in the bindings, such as the mutual recursion of ",
        '13' =>
        " and ",
        '14' =>
        " in the example above, or the evaluation of ",
        '15' =>
        " factorial with",
        '16' =>
        "a. Implement ",
        '17' =>
        " as a derived expression, by transforming a ",
        '18' =>
        " expression into a ",
        '19' =>
        " expression as shown in the text above or in exercise ",
        '20' =>
        ". That is, the ",
        '21' =>
        " variables should be created with a ",
        '22' =>
        " and then be assigned their values with ",
        '23' =>
        ".",
        '24' =>
        "b. Louis Reasoner is confused by all this fuss about internal definitions. The way he sees " .
        "it, if you don't like to use ",
        '25' =>
        " inside a procedure, you can just use ",
        '26' =>
        ". Illustrate what is loose about his reasoning by drawing an environment diagram that shows the environment in which the ",
        '27' =>
        " is evaluated during evaluation of the expression ",
        '28' =>
        ", with ",
        '29' =>
        " defined as in this exercise. Draw an environment diagram for the same evaluation, but with ",
        '30' =>
        " in place of ",
        '31' =>
        " in the definition of ",
        '32' =>
        ".",
    ],
];
