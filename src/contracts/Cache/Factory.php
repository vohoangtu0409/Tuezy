<?php

namespace Tuezy\Contracts\Cache;

interface Factory
{
    /**
     * Get a cache store instance by name.
     *
     * @param  string|null  $name
     * @return \Tuezy\Contracts\Cache\Repository
     */
    public function store($name = null);
}
