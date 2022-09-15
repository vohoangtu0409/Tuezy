<?php
use \Illuminate\Config\Repository;
$configs = new Repository(include ROOT . 'configs.php');
$container = \Tuezy\App::getInstance();
$container->alias('config', Repository::class);
$container->instance('config', $configs);
