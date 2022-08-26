<?php

namespace Tuezy\Contracts\Filesystem;

interface Factory
{
    /**
     * Get a filesystem implementation.
     *
     * @param  string|null  $name
     * @return \Tuezy\Contracts\Filesystem\Filesystem
     */
    public function disk($name = null);
}
