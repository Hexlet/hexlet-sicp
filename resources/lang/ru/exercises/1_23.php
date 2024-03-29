<?php

return [
    'title' => "Модификация smallest-divisor",
    'description' => [
        '1' =>
        "Процедура ",
        '2' =>
        " в начале этого раздела проводит множество лишних проверок: после того, как она проверяет, " .
        "делится ли число на 2, нет никакого смысла проверять делимость на другие четные числа. " .
        "Таким образом, вместо последовательности 2, 3, 4, 5, 6 . . . , используемой для ",
        '3' =>
        ", было бы лучше использовать 2, 3, 5, 7, 9 . . . . Чтобы реализовать такое улучшение, напишите процедуру ",
        '4' =>
        ", которая имеет результатом 3, если получает 2 как аргумент, а иначе возвращает свой аргумент плюс 2. В ",
        '5' =>
        " используйте ",
        '6' =>
        " вместо ",
        '7' =>
        ". Используя процедуру ",
        '8' =>
        " с модифицированной версией ",
        '9' =>
        ", запустите тест для каждого из 12 простых чисел, найденных в упражнении ",
        '10' =>
        ". Поскольку эта модификация снижает количество шагов проверки вдвое, " .
        "Вы должны ожидать двукратного ускорения проверки. Подтверждаются ли эти ожидания? " .
        "Если нет, то каково наблюдаемое соотношение скоростей двух алгоритмов, и как Вы объясните то, что оно отличается от 2?",
    ],
];
