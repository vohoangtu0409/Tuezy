<?php
$container = \Illuminate\Container\Container::getInstance();



$container->instance('app', $container);
$container->bind('app', \Illuminate\Container\Container::class);
$container->alias('container', 'app');
$container->alias(\Illuminate\Contracts\Container\Container::class, \Illuminate\Container\Container::class);

$config = new \Illuminate\Config\Repository(include ROOT . 'configs.php');

$container->instance('config', $config);
$container->bind('config', \Illuminate\Config\Repository::class);
$container->alias(\Illuminate\Config\Repository::class, \Illuminate\Contracts\Config\Repository::class);

\Tuezy\Facade::setFacadeApplication($container);