<?php

return [
    'title' => "A series RLC circuit",
    'description' => [
        '1' =>
        "A series ",
        '2' =>
        " circuit consists of a resistor, a capacitor, and an inductor connected in series, as shown in figure 3.36. If ",
        '3' =>
        ", ",
        '4' =>
        ", and ",
        '5' =>
        " are the resistance, inductance, and capacitance, then the relations between voltage (",
        '6' =>
        ") and current (",
        '7' =>
        ") for the three components are described by the equations",
        '8' =>
        "and the circuit connections dictate the relations",
        '9' =>
        "Combining these equations shows that the state of the circuit (summarized by ",
        '10' =>
        ", the voltage across the capacitor, and ",
        '11' =>
        ", the current in the inductor) is described by the pair of differential equations",
        '12' =>
        "The signal-flow diagram representing this system of differential equations is shown in figure 3.37.",
        '13' =>
        "Figure 3.36:  A series RLC circuit.",
        '14' =>
        "Figure 3.37:  A signal-flow diagram for the solution to a series RLC circuit.",
        '15' =>
        "Write a procedure ",
        '16' =>
        " that takes as arguments the parameters ",
        '17' =>
        ", ",
        '18' =>
        ", and ",
        '19' =>
        " of the circuit and the time increment ",
        '20' =>
        ". In a manner similar to that of the ",
        '21' =>
        " procedure of exercise ",
        '22' =>
        ", ",
        '23' =>
        " should produce a procedure that takes the initial values of the state variables, ",
        '24' =>
        " and ",
        '25' =>
        ", and produces a pair (using ",
        '26' =>
        ") of the streams of states ",
        '27' =>
        " and ",
        '28' =>
        ". Using ",
        '29' =>
        ", generate the pair of streams that models the behavior of a series ",
        '30' =>
        " circuit with ",
        '31' =>
        " ohm, ",
        '32' =>
        " farad, ",
        '33' =>
        " henry, ",
        '34' =>
        " second, and initial values ",
        '35' =>
        " amps and ",
        '36' =>
        " volts.",
    ],
];
