<?php
namespace Tuezy;

use Illuminate\Container\Container;

class Route{

    protected $container;
    public function __construct(Container $container = null)
    {
        $this->container = $container ?? Container::getInstance();
    }
    public function route($method, $prefix, $uri){
        return compiled($method . '/' . $prefix . $uri);
    }
    public function routes(){

    }
    public function handle(){
        $uri = $this->container->get('hashURI');
        switch ($uri){
            case compiled('')
        }
    }

}