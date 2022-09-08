<?php

return [
    'title' => "The quality of the compiler",
    'description' => [
        '1' =>
        "By comparing the stack operations used by compiled code to the stack operations used by the evaluator for the same computation, we can determine the extent to which the compiler optimizes use of the stack, both in speed (reducing the total number of stack operations) and in space (reducing the maximum stack depth). " .
        "Comparing this optimized stack use to the performance of a special-purpose machine for the same computation gives some indication of the quality of the compiler.",
        '2' =>
        "a. Exercise ",
        '3' =>
        " asked you to determine, as a function of n",
        '4' =>
        ", the number of pushes and the maximum stack depth needed by the evaluator to compute n!",
        '5' =>
        " using the recursive factorial procedure given above. Exercise ",
        '6' =>
        " asked you to do the same measurements for the special-purpose factorial machine shown in figure 5.11. Now perform the same analysis using the compiled factorial",
        '7' =>
        " procedure.",
        '8' =>
        "Take the ratio of the number of pushes in the compiled version to the number of pushes in the interpreted version, and do the same for the maximum stack depth. " .
        "Since the number of operations and the stack depth used to compute n!",
        '9' =>
        " are linear in n",
        '10' =>
        ", these ratios should approach constants as n",
        '11' =>
        " becomes large. " .
        "What are these constants? Similarly, find the ratios of the stack usage in the special-purpose machine to the usage in the interpreted version.",
        '12' =>
        "Compare the ratios for special-purpose versus interpreted code to the ratios for compiled versus interpreted code. " .
        "You should find that the special-purpose machine does much better than the compiled code, since the hand-tailored controller code should be much better than what is produced by our rudimentary general-purpose compiler.",
        '13' =>
        "b. Can you suggest improvements to the compiler that would help it generate code that would come closer in performance to the hand-tailored version?",
        '14' =>
        "Figure 5.11: A recursive factorial machine.",
    ],
];
