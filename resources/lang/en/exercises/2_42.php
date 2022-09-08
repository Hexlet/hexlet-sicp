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
        "Once we have placed ",
        '3' =>
        " queens, we must place the ",
        '4' =>
        "th queen in a position where it does not check any of the queens already on the board. We can formulate this approach recursively: Assume that we have already generated the sequence of all possible ways to place ",
        '5' =>
        " queens in the first ",
        '6' =>
        " columns of the board. For each of these ways, generate an extended set of positions by placing a queen in each row of the ",
        '7' =>
        "th column. Now filter these, keeping only the positions for which the queen in the ",
        '8' =>
        "th column is safe with respect to the other queens. By continuing this process, we will produce not only one solution, but all solutions to the puzzle.",
        '9' =>
        "We implement this solution as a procedure ",
        '10' =>
        ", which returns a sequence of all solutions to the problem of placing ",
        '11' =>
        " queens on an ",
        '12' =>
        " chessboard. ",
        '13' =>
        " has an internal procedure ",
        '14' =>
        " that returns the sequence of all ways to place queens in the first ",
        '15' =>
        " columns of the board.",
        '16' =>
        "In this procedure ",
        '17' =>
        " is a way to place ",
        '18' =>
        " queens in the first ",
        '19' =>
        " columns, and ",
        '20' =>
        " is a proposed row in which to place the queen for the ",
        '21' =>
        "th column. Complete the program by implementing the representation for sets of board positions, including the procedure ",
        '22' =>
        ", which adjoins a new row-column position to a set of positions, and ",
        '23' =>
        ", which represents an empty set of positions. You must also write the procedure ",
        '24' =>
        ", which determines for a set of positions, whether the queen in the ",
        '25' =>
        "th column is safe with respect to the others. (Note that we need only check whether the new queen is safe -- the other queens are already guaranteed safe with respect to each other.)",
    ],
];
