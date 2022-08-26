<?php

namespace Tuezy\Contracts\Queue;

interface Factory
{
    /**
     * Resolve a queue connection instance.
     *
     * @param  string|null  $name
     * @return \Tuezy\Contracts\Queue\Queue
     */
    public function connection($name = null);
}
