<?php
function compiled($str){
    return preg_replace('/({+[^\/]+})/', '[a-zA-Z0-9]', $str);
}
function container(): \Illuminate\Container\Container{
    return \Illuminate\Container\Container::getInstance();
}
function repository(): \Illuminate\Config\Repository{
    return container()->get('config');
}
function config($key){
    return repository()->get($key);
}
function request(){
    return container()->get('request');
}
function database(): \Illuminate\Database\Capsule\Manager{
    return container()->get('database');
}