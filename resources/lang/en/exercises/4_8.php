<?php

return [
    'title' => 'Named let',
    'description' => [
        '1' => "«Named let» is a variant of let that has the form",
        '2' => "The <bindings> and <body> are just as in ordinary let, except that <var> is bound within <body> to " .
        "a procedure whose body is <body> and whose parameters are the variables in the <bindings>. Thus, one can " .
        "repeatedly execute the <body> by invoking the procedure named <var>. For example, the iterative Fibonacci " .
        "procedure (section 1.2.2) can be rewritten using named let as follows:",
        '3' => "Modify let->combination of exercise 4.6 to also support named let."
    ]
];
