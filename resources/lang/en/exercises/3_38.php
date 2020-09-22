<?php

return [
    'title' => "Joint bank account",
    'description' => [
        '1' =>
        "Suppose that Peter, Paul, and Mary share a joint bank account that initially contains $100. " .
        "Concurrently, Peter deposits $10, Paul withdraws $20, and Mary withdraws half the money in the account, by executing the following commands:",
        '2' =>
        "a. List all the different possible values for balance after these three transactions have been completed, assuming that the banking system forces the three processes to run sequentially in some order.",
        '3' =>
        "b. What are some other values that could be produced if the system allows the processes to be interleaved? Draw timing diagrams like the one in figure 3.29 to explain how these values can occur.",
        '4' =>
        "Figure 3.29:  Timing diagram showing how interleaving the order of events in two banking withdrawals can lead to an incorrect final balance.",
    ],
];
