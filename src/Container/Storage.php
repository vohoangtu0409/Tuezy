<?php
namespace Tuezy\Container;

use Illuminate\Support\Collection;
use Psr\Container\ContainerInterface;

class Storage implements ContainerInterface, \ArrayAccess{

    protected Collection $collection;

    public function __construct()
    {
        $this->collection = new Collection([]);
    }

    public function get(string $id)
    {
        return $this->collection->get($id, null);
    }

    public function has(string $id)
    {
        return $this->collection->has($id);
    }

    public function set(string $id, $value){
        $this->collection->put($id, $value);
    }

    public function offsetExists($offset)
    {
       return $this->collection->hasAny($offset);
    }

    public function offsetGet($offset)
    {
        return $this->collection->firstOrFail($offset);
    }

    public function offsetSet($offset, $value)
    {
        $this->collection->put($offset, $value);
    }

    public function offsetUnset($offset)
    {
        $this->collection->forget($offset);
    }
}