<?php
namespace Tuezy\Container;

class StorageBinding extends Storage{
    public function has(string $id)
    {
        if(parent::has($id)){
            return 2;
        }
        return 0;
    }
}