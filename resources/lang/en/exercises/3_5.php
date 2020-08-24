<?php

return [
    'title' => 'Monte Carlo integration',
    'description' => [
        '1' =>
        'Monte Carlo integration is a method of estimating definite integrals by means of Monte Carlo simulation. ' .
        'Consider computing the area of a region of space described by a predicate ',
        '2' =>
        ' that is true for points ',
        '3' =>
        ' in the region and false for points not in the region. For example, ' .
        'the region contained within a circle of radius ',
        '4' =>
        ' centered at ',
        '5' =>
        ' is described by the predicate that tests whether ',
        '6' =>
        '. To estimate the area of the region described by such a predicate, begin by choosing a rectangle that contains the region. ' .
        'For example, a rectangle with diagonally opposite corners at ',
        '7' =>
        ' and ',
        '8' =>
        ' contains the circle above. ' .
        'The desired integral is the area of that portion of the rectangle that lies in the region. ' .
        'We can estimate the integral by picking, at random, points ',
        '9' =>
        ' that lie in the rectangle, and testing ',
        '10' =>
        ' for each point to determine whether the point lies in the region. ' .
        'If we try this with many points, then the fraction of points that fall in the region should give an estimate of the proportion of the rectangle that lies in the region. ' .
        'Hence, multiplying this fraction by the area of the entire rectangle should produce an estimate of the integral.',
        '11' =>
        'Implement Monte Carlo integration as a procedure ',
        '12' =>
        ' that takes as arguments a predicate ',
        '13' =>
        ', upper and lower bounds ',
        '14' =>
        ' and ',
        '15' =>
        ' for the rectangle, and the number of trials to perform in order to produce the estimate. ' .
        'Your procedure should use the same ',
        '16' =>
        ' procedure that was used above to estimate ',
        '17' =>
        '. Use your ',
        '18' =>
        ' to produce an estimate of ',
        '19' =>
        ' by measuring the area of a unit circle.',
        '20' =>
        'You will find it useful to have a procedure that returns a number chosen at random from a given range. ' .
        'The following ',
        '21' =>
        'procedure implements this in terms of the ',
        '22' =>
        ' procedure used in section ',
        '23' =>
        ', which returns a nonnegative number less than its input.',
    ],
];
