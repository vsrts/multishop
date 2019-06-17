<?php
return [
    'root' => [
        'type' => 1,
        'ruleName' => 'userRole',
        'children' => [
            'admin',
        ],
    ],
    'admin' => [
        'type' => 1,
        'ruleName' => 'userRole',
        'children' => [
            'manager',
        ],
    ],
    'manager' => [
        'type' => 1,
        'ruleName' => 'userRole',
    ],
];
