<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Container\Container;

use Tuezy\Helper\Config;
$container = \Tuezy\App::getInstance();
$capsule = new Capsule(Container::getInstance());
$params = [
    'host'      => Config::get('database.DB_HOST'),
    'username'  => Config::get('database.DB_USER'),
    'password'  => Config::get('database.DB_PASS'),
    'database'  => Config::get('database.DB_DATABASE'),
    'driver'    => Config::get('database.DB_DRIVER'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
];
$capsule->addConnection($params);
$capsule->setEventDispatcher($container->get('events'));
$capsule->setAsGlobal();
$capsule->bootEloquent();
$capsule->getConnection()->setSchemaGrammar(new \Illuminate\Database\Schema\Grammars\MySqlGrammar());

$container->instance('database', $capsule);