<?php

return [
    'title' => "An RC circuit",
    'description' => [
        '1' =>
        "Figure 3.33:  An RC circuit and the associated signal-flow diagram.",
        '2' =>
        "We can model electrical circuits using streams to represent the values of currents or voltages at a sequence of times. " .
        "For instance, suppose we have an ",
        '3' =>
        " circuit consisting of a resistor of resistance ",
        '4' =>
        " and a capacitor of capacitance ",
        '5' =>
        " in series. The voltage response ",
        '6' =>
        " of the circuit to an injected current ",
        '7' =>
        " is determined by the formula in figure 3.33, whose structure is shown by the accompanying signal-flow diagram.",
        '8' =>
        "Write a procedure ",
        '9' =>
        " that models this circuit. ",
        '10' =>
        " should take as inputs the values of ",
        '11' =>
        ", ",
        '12' =>
        ", and ",
        '13' =>
        " and should return a procedure that takes as inputs a stream representing the current ",
        '14' =>
        " and an initial value for the capacitor voltage ",
        '15' =>
        " and produces as output the stream of voltages ",
        '16' =>
        ". For example, you should be able to use ",
        '17' =>
        " to model an ",
        '18' =>
        " circuit with ",
        '19' =>
        " ohms, ",
        '20' =>
        " farad, and a ",
        '21' =>
        "-second time step by evaluating ",
        '22' =>
        ". This defines ",
        '23' =>
        " as a procedure that takes a stream representing the time sequence of currents and an initial capacitor voltage and produces the output stream of voltages.",
    ],
];
