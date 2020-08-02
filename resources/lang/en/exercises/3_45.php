<?php

return [
    'title' => "Redefine accounts",
    'description' => [
        '1' =>
        "Louis Reasoner thinks our bank-account system is unnecessarily complex and error-prone now that deposits and withdrawals aren't automatically serialized. " .
        "He suggests that make-account-and-serializer should have exported the serializer (for use by such procedures as serialized-exchange) in addition to (rather than instead of) using it to serialize accounts and deposits as make-account did. " .
        "He proposes to redefine accounts as follows:",
        '2' =>
        "Then deposits are handled as with the original make-account:",
        '3' =>
        "Explain what is wrong with Louis's reasoning. In particular, consider what happens when serialized-exchange is called.",
    ],
];
