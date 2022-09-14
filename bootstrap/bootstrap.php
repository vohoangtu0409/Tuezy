<?php
require ROOT . 'vendor/autoload.php';

foreach([
    'bootstrap_define.php',
    'bootstrap_configs.php',
    'bootstrap_view.php',
    'bootstrap_eloquent.php',
    'bootstrap_core.php',
        ] as $bootstrapFiles){

    include __DIR__ . DIRECTORY_SEPARATOR . $bootstrapFiles;
}