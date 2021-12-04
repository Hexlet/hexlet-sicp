<?php

return [
    'title' => "Restore a register that was not the last one saved",
    'description' => [
       '1' =>
       "When we introduced ",
       '2' =>
       " and ",
       '3' =>
       " in section 5.1.4, we didn't specify what would happen if you tried to restore a register that was not the last one saved, as in the sequence",
       '4' =>
       "There are several reasonable possibilities for the meaning of ",
       '5' =>
       ":",
       '6' =>
       "a. ",
       '7' =>
       " puts into ",
       '8' =>
       " the last value saved on the stack, regardless of what register that " .
       "value came from. This is the way our simulator behaves. Show how to take advantage of this behavior to " .
       "eliminate one instruction from the Fibonacci machine of section 5.1.4 (figure 5.12).",
       '9' =>
       "b. ",
       '10' =>
       " puts into ",
       '11' =>
       " the last value saved on the stack, but only if that value was saved from ",
       '12' =>
       "; otherwise, it signals an error. Modify the simulator to behave this way. You will have to change ",
       '13' =>
       " to put the register name on the stack along with the value.",
       '14' =>
       "c. ",
       '15' =>
       " puts into ",
       '16' =>
       " the last value saved from ",
       '17' =>
       " regardless of what other registers were saved after ",
       '18' =>
       " and not restored. Modify the simulator to behave this way. You will have to associate a separate stack with each register. You should make the ",
       '19' =>
       " operation initialize all the register stacks.",
       '20' =>
       "Figure 5.12:  Controller for a machine to compute Fibonacci numbers.",
    ],
];
