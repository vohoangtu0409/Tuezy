<?php
$container = \Illuminate\Container\Container::getInstance();
$container->instance('app', $container);
$container->bind('app', \Illuminate\Container\Container::class);

$request = \Illuminate\Http\Request::capture();

container()->instance('request', $request);
container()->bind('request', \Illuminate\Http\Client\Request::class);