<?php

return [
    'title' => "Matrix operations",
    'description' => [
        '1' =>
        "Suppose we represent vectors v = (vᵢ) as sequences of numbers, and matrices m = (mᵢⱼ) as sequences of vectors (the rows of the matrix). For example, the matrix",
        '2' =>
        "is represented as the sequence ((1 2 3 4) (4 5 6 6) (6 7 8 9)). " .
        "With this representation, we can use sequence operations to concisely express the basic matrix and vector operations. " .
        "These operations (which are described in any book on matrix algebra) are the following:",
        '3' =>
        "(dot-product v w) returns the sum ∑ᵢvᵢwᵢ;",
        '4' =>
        "(matrix-*-vector m v) returns the vector t, where tᵢ = ∑ⱼmᵢⱼvᵢ;",
        '5' =>
        "(matrix-*-matrix m n) returns the matrix p, where pᵢⱼ = ∑ₖmᵢₖnₖⱼ",
        '6' =>
        "(transpose m) returns the matrix n, where nᵢⱼ = mⱼᵢ",
        '7' =>
        "We can define the dot product as",
        '8' =>
        "Fill in the missing expressions in the following procedures for computing the other matrix operations. (The procedure accumulate-n is defined in exercise ",
        '9' =>
        ".)",
    ],
];
