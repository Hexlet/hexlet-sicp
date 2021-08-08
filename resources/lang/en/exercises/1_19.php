<?php

return [
    'title' => 'Fibonacci numbers through transformation',
    'description' => [
        '1' =>
        'There is a clever algorithm for computing the Fibonacci numbers in a logarithmic number of steps. ' .
        'Recall the transformation of the state variables ',
        '2' =>
        ' and ',
        '3' =>
        ' in the ',
        '4' =>
        ' process of section 1.2.2: ',
        '5' =>
        ' and ',
        '6' =>
        '. Call this transformation ',
        '7' =>
        ', and observe that applying ',
        '8' =>
        ' over and over again n times, starting with 1 and 0, produces the pair ',
        '9' =>
        ' and ',
        '10' =>
        '. In other words, the Fibonacci numbers are produced by applying ',
        '11' =>
        ', the nth power of the transformation ',
        '12' =>
        ', starting with the pair ',
        '13' =>
        '. Now consider ',
        '14' =>
        ' to be the special case of ',
        '15' =>
        ' and ',
        '16' =>
        ' in a family of transformations ',
        '17' =>
        ', where ',
        '18' =>
        ' transforms the pair ',
        '19' =>
        ' according to ',
        '20' =>
        '. Show that if we apply such a transformation ',
        '21' =>
        ' twice, the effect is the same as using a single transformation ',
        '22' =>
        ' of the same form, and compute ',
        '23' =>
        ' and ',
        '24' =>
        ' in terms of ',
        '25' =>
        ' and ',
        '26' =>
        '. This gives us an explicit way to square these transformations, and thus we can compute ',
        '27' =>
        ' using successive squaring, as in the ',
        '28' =>
        ' procedure. Put this all together to complete the following procedure, which runs in a logarithmic number of steps:',
    ],
];
