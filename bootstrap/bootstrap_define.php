<?php

use Illuminate\Cache\CacheManager;
use Illuminate\Cache\MemcachedConnector;
use Illuminate\Cache\RateLimiter;
use Illuminate\Container\Container;
use Tuezy\Helper\Services;
use Illuminate\Events\Dispatcher;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Cache\Adapter\Psr16Adapter;

$app = \Tuezy\App::getInstance();

Services::setFacadeApplication(Container::getInstance());

$app->bindIf('files', function () {
    return new Filesystem;
}, true);

$app->bindIf('events', function () {
    return new Dispatcher;
}, true);

$app->singleton('cache', function () {
    return new CacheManager(\Tuezy\App::getInstance());
});

$app->singleton('cache.store', function ($app) {
    return $app['cache']->driver();
});

$app->singleton('cache.psr6', function ($app) {
    return new Psr16Adapter($app['cache.store']);
});

$app->singleton('memcached.connector', function () {
    return new MemcachedConnector;
});

$app->singleton(RateLimiter::class, function ($app) {
    return new RateLimiter($app->make('cache')->driver(
        $app['config']->get('cache.limiter')
    ));
});

