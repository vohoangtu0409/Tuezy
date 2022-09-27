<?php
const ROOT = __DIR__ . DIRECTORY_SEPARATOR;
require ROOT . 'vendor/autoload.php';

$ioc = \Tuezy\Container\IoC::getInstance();

$ioc->bind('test', 'Test 1');

$ioc->alias('test', 'Test 2');
dump($ioc);
unset($ioc['test']);
dump($ioc);