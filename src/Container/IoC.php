<?php
namespace Tuezy\Container;

class IoC implements \ArrayAccess{

    protected Storage $alias;

    protected Storage $binding;

    protected Storage $instances;

    public static $instance = null;

    public function __construct()
    {
        $this->alias = new StorageAlias();
        $this->binding = new StorageBinding();
        $this->instances = new StorageInstances();
    }

    public static function getInstance(): IoC{
        if(is_null(static::$instance))
            static::$instance = new static();
        return static::$instance;
    }

    public function alias(string $key, string $value){
        $this->alias->set($key, $value);
    }

    public function bind(string $key, $value){
        $this->binding->set($key, $value);
    }

    public function instance(string $key, $value){
        $this->instances->set($key, $value);
    }

    public function detectStorage($pos){
        return [
            1   =>  'instances',
            2   =>  'binding',
            3   =>  ['instances', 'binding'],
            4   =>  'alias',
            5   =>  ['instances', 'alias'],
            6   =>  ['binding', 'alias'],
            7   =>  ['instances', 'binding', 'alias']
        ][$pos] ?? null;
    }

    public function offsetExists($offset)
    {
        return $this->instances->has($offset) + $this->binding->has($offset) + $this->alias->has($offset);
    }

    public function offsetGet($offset)
    {
        $pos = $this->offsetExists($offset);

        $typeOfStorage = $this->detectStorage($pos);

        if(!$typeOfStorage) return null;

        if(is_array($typeOfStorage)){
            $result = [];
            foreach ($typeOfStorage as $type){
                $result[$type] = $this->{$type}->get($offset);
            }
            return $result;
        }
        $this->{$typeOfStorage}->get($offset);
    }

    public function offsetSet($offset, $value)
    {
        throw new \Exception("Can not direct set value");
    }

    public function offsetUnset($offset)
    {
        unset($this->instances[$offset]);
        unset($this->alias[$offset]);
        unset($this->binding[$offset]);
    }
}