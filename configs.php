<?php
return [
    'debug' => true,
    'database' => [
        'DB_HOST'   => 'localhost',
        'DB_USER'   => 'root',
        'DB_PASS'   => '',
        'DB_DATABASE'   => 'test1',
        'DB_DRIVER' => 'mysql'
    ],
    'view' => [
       'path'  => ROOT . 'resources/views',
       'cache' => ROOT . 'caches/views'
    ]
];
