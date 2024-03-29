<?php

return [
    'title' => "Задача о восьми ферзях",
    'description' => [
        '1' =>
        "Рис. 2.8. Решение задачи о восьми ферзях.",
        '2' =>
        "В «задаче о восьми ферзях» спрашивается, как расставить на шахматной доске восемь ферзей так, чтобы ни один из них не бил другого (то есть никакие два ферзя не должны находиться на одной вертикали, горизонтали или диагонали). " .
        "Одно из возможных решений показано на рисунке 2.8. " .
        "Один из способов решать эту задачу состоит в том, чтобы идти поперек доски, устанавливая по ферзю в каждой вертикали. " .
        "После того, как ",
        '3' =>
        " ферзя мы уже разместили, нужно разместить ",
        '4' =>
        "-го в таком месте, где он не бьет ни одного из тех, которые уже находятся на доске. " .
        "Этот подход можно сформулировать рекурсивно: предположим, что мы уже породили последовательность из всех возможных способов разместить ",
        '5' =>
        " ферзей на первых ",
        '6' =>
        " вертикалях доски. Для каждого из этих способов мы порождаем расширенный набор позиций, добавляя ферзя на каждую горизонталь ",
        '7' =>
        "-й вертикали. Затем эти позиции нужно отфильтровать, оставляя только те, где ферзь на ",
        '8' =>
        "-й вертикали не бьется ни одним из остальных. Продолжая этот процесс, мы породим не просто одно решение, а все решения этой задачи." ,
        '9' =>
        "Это решение мы реализуем в процедуре ",
        '10' =>
        ", которая возвращает последовательность решений задачи размещения ",
        '11' =>
        " ферзей на доске ",
        '12' =>
        ". В процедуре ",
        '13' =>
        " есть внутренняя процедура ",
        '14' =>
        ", которая возвращает последовательность всех способов разместить ферзей на первых ",
        '15' =>
        " вертикалях доски.",
        '16' =>
        "В этой процедуре ",
        '17' =>
        " есть способ размещения ",
        '18' =>
        " ферзя на первых ",
        '19' =>
        " вертикалях, а ",
        '20' =>
        " — это горизонталь, на которую предлагается поместить ферзя с ",
        '21' =>
        "-й вертикали. Завершите эту программу, реализовав представление множеств позиций ферзей на доске, включая процедуру ",
        '22' =>
        ", которая добавляет нового ферзя на определенных горизонтали и вертикали к заданному множеству позиций, и ",
        '23' =>
        ", которая представляет пустое множество позиций. Еще нужно написать процедуру ",
        '24' =>
        ", которая для множества позиций определяет, находится ли ферзь с ",
        '25' =>
        "-й вертикали в безопасности от остальных. (Заметим, что нам требуется проверять только то, находится ли в безопасности новый ферзь — для остальных ферзей безопасность друг от друга уже гарантирована.)",
    ],
];
