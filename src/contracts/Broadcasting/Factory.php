<?php

namespace Tuezy\Contracts\Broadcasting;

interface Factory
{
    /**
     * Get a broadcaster implementation by name.
     *
     * @param  string|null  $name
     * @return \Tuezy\Contracts\Broadcasting\Broadcaster
     */
    public function connection($name = null);
}
