<?php

return [
    'title' => 'Monte Carlo integration',
    'description1' =>
        'Monte Carlo integration is a method of estimating definite integrals by means of Monte Carlo simulation. ' .
        'Consider computing the area of a region of space described by a predicate ',
    'description2' =>
        ' that is true for points ',
    'description3' =>
        ' in the region and false for points not in the region. For example, ' .
        'the region contained within a circle of radius ',
    'description4' =>
        ' centered at ',
    'description5' =>
        ' is described by the predicate that tests whether ',
    'description6' =>
        '. To estimate the area of the region described by such a predicate, begin by choosing a rectangle that contains the region. ' .
        'For example, a rectangle with diagonally opposite corners at ',
    'description7' =>
        ' and ',
    'description8' =>
        ' contains the circle above. ' .
        'The desired integral is the area of that portion of the rectangle that lies in the region. ' .
        'We can estimate the integral by picking, at random, points ',
    'description9' =>
        ' that lie in the rectangle, and testing ',
    'description10' =>
        ' for each point to determine whether the point lies in the region. ' .
        'If we try this with many points, then the fraction of points that fall in the region should give an estimate of the proportion of the rectangle that lies in the region. ' .
        'Hence, multiplying this fraction by the area of the entire rectangle should produce an estimate of the integral.',
    'description11' =>
        'Implement Monte Carlo integration as a procedure ',
    'description12' =>
        ' that takes as arguments a predicate ',
    'description13' =>
        ', upper and lower bounds ',
    'description14' =>
        ' and ',
    'description15' =>
        ' for the rectangle, and the number of trials to perform in order to produce the estimate. ' .
        'Your procedure should use the same ',
    'description16' =>
        ' procedure that was used above to estimate ',
    'description17' =>
        '. Use your ',
    'description18' =>
        ' to produce an estimate of ',
    'description19' =>
        ' by measuring the area of a unit circle.',
    'description20' =>
        'You will find it useful to have a procedure that returns a number chosen at random from a given range. ' .
        'The following ',
    'description21' =>
        'procedure implements this in terms of the ',
    'description22' =>
        ' procedure used in section ',
    'description23' =>
        ', which returns a nonnegative number less than its input.'
];
