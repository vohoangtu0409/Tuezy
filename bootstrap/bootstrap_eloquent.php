<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Container\Container;
$container = Container::getInstance();
$capsule = new Capsule($container);
$params = [
    'host'      => config('database.DB_HOST'),
    'username'  => config('database.DB_USER'),
    'password'  => config('database.DB_PASS'),
    'database'  => config('database.DB_DATABASE'),
    'driver'    => config('database.DB_DRIVER'),
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