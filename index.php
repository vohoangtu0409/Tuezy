<?php
const ROOT = __DIR__ . DIRECTORY_SEPARATOR;
require ROOT . 'vendor/autoload.php';

foreach([
            'bootstrap_define.php',
            'bootstrap_view.php',
            'bootstrap_eloquent.php',
            'bootstrap_core.php',
        ] as $bootstrapFiles){

    include ROOT . 'bootstrap/'. $bootstrapFiles;

}

$request = (new \Tuezy\Request());
$request->capture();

dump($request, $_REQUEST);
