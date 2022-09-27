<?php
namespace Tuezy\Container;

class StorageInstances extends Storage{
    public function has(string $id)
    {
        if(parent::has($id)){
            return 1;
        }
        return 0;
    }
}