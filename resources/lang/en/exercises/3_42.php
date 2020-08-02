<?php

return [
    'title' => "Make-account changing",
    'description' => [
        '1' =>
        "Ben Bitdiddle suggests that it's a waste of time to create a new serialized procedure in response to every withdraw and deposit message. " .
        "He says that make-account could be changed so that the calls to protected are done outside the dispatch procedure. " .
        "That is, an account would return the same serialized procedure (which was created at the same time as the account) each time it is asked for a withdrawal procedure.",
        '2' =>
        "Is this a safe change to make? In particular, is there any difference in what concurrency is allowed by these two versions of make-account ?",
    ],
];
