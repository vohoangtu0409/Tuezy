<?php

namespace Tuezy\Contracts\Redis;

interface Factory
{
    /**
     * Get a Redis connection by name.
     *
     * @param  string|null  $name
     * @return \Tuezy\Redis\Connections\Connection
     */
    public function connection($name = null);
}
