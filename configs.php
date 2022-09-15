<?php
return [
    'debug' => true,
    'database' => [
        'DB_HOST'   => 'localhost',
        'DB_USER'   => 'root',
        'DB_PASS'   => '',
        'DB_DATABASE'   => 'laravel',
        'DB_DRIVER' => 'mysql'
    ],
    'view' => [
       'path'  => ROOT . 'resources/views',
       'cache' => ROOT . 'cache/views'
    ],
    'whiteList' => [
        'index'
    ]
];
