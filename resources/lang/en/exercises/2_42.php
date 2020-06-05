<?php

return [
    'title' => "Eight queens puzzle",
    'description' => [
        '1' =>
        "Figure 2.8:  A solution to the eight-queens puzzle.",
        '2' =>
        "The ''eight-queens puzzle'' asks how to place eight queens on a chessboard so that no queen is in check from any other (i.e., no two queens are in the same row, column, or diagonal). " .
        "One possible solution is shown in figure 2.8. " .
        "One way to solve the puzzle is to work across the board, placing a queen in each column. " .
        "Once we have placed k - 1 queens, we must place the kth queen in a position where it does not check any of the queens already on the board. " .
        "We can formulate this approach recursively: Assume that we have already generated the sequence of all possible ways to place k - 1 queens in the first k - 1 columns of the board. " .
        "For each of these ways, generate an extended set of positions by placing a queen in each row of the kth column. " .
        "Now filter these, keeping only the positions for which the queen in the kth column is safe with respect to the other queens. " .
        "This produces the sequence of all ways to place k queens in the first k columns. " .
        "By continuing this process, we will produce not only one solution, but all solutions to the puzzle.",
        '3' =>
        "We implement this solution as a procedure queens, which returns a sequence of all solutions to the problem of placing n queens on an n × n chessboard. " .
        "Queens has an internal procedure queen-cols that returns the sequence of all ways to place queens in the first k columns of the board.",
        '4' =>
        "In this procedure rest-of-queens is a way to place k - 1 queens in the first k - 1 columns, and new-row is a proposed row in which to place the queen for the kth column. " .
        "Complete the program by implementing the representation for sets of board positions, including the procedure adjoin-position, which adjoins a new row-column position to a set of positions, and empty-board, which represents an empty set of positions. " .
        "You must also write the procedure safe?, which determines for a set of positions, whether the queen in the kth column is safe with respect to the others. " .
        "(Note that we need only check whether the new queen is safe -- the other queens are already guaranteed safe with respect to each other.)"
    ]
];
