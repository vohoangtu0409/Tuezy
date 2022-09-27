<?php
namespace Tuezy\Container;

class StorageAlias extends Storage{
    public function has(string $id)
    {
        if(parent::has($id)){
            return 4;
        }
        return 0;
    }
}