<?php

return [
    'title' => 'Drop procedure',
    'description' => [
        '1' =>
        "This section mentioned a method for ''simplifying'' a data object by lowering it in the tower of types as far as possible. Design a procedure ",
        '2' =>
        " that accomplishes this for the tower described in exercise ",
        '3' =>
        ". The key is to decide, in some general way, whether an object can be lowered. For example, the complex number ",
        '4' =>
        " can be lowered as far as ",
        '5' =>
        ", the complex number ",
        '6' =>
        " can be lowered as far as ",
        '7' =>
        ", and the complex number ",
        '8' =>
        " cannot be lowered at all. Here is a plan for determining whether an object can be lowered: Begin by defining a generic operation ",
        '9' =>
        " that ''pushes'' an object down in the tower. For example, projecting a complex number would involve throwing away the imaginary part. " .
        "Then a number can be dropped if, when we project it and raise the result back to the type we started with, we end up with something equal to what we started with. " .
        "Show how to implement this idea in detail, by writing a ",
        '10' =>
        " procedure that drops an object as far as possible. You will need to design the various projection operations and install ",
        '11' =>
        " as a generic operation in the system. You will also need to make use of a generic equality predicate, such as described in exercise ",
        '12' =>
        ". Finally, use ",
        '13' =>
        " to rewrite ",
        '14' =>
        " from exercise ",
        '15' =>
        " so that it ''simplifies'' its answers.",
    ],
];
