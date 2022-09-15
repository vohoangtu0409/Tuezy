<?php
namespace Tuezy;

use Illuminate\Container\Container;

class Route{

    public function handle(){

       switch (HASH_REQUEST){
           case 'GET/index/':
               echo 'index';
               break;
       }
    }

    private function add(){

    }

}