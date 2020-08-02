<?php

return [
    'title' => "Analyze-require procedure",
    'description' => [
        '1' =>
        "If we had not realized that require could be implemented as an ordinary procedure that uses amb, to be defined by the user as part of a nondeterministic program, we would have had to implement it as a special form. This would require syntax procedures",
        '2' =>
        "and a new clause in the dispatch in analyze",
        '3' =>
        "as well the procedure analyze-require that handles require expressions. Complete the following definition of analyze-require.",
    ],
];
