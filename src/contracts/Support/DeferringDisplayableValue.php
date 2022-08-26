<?php

namespace Tuezy\Contracts\Support;

interface DeferringDisplayableValue
{
    /**
     * Resolve the displayable value that the class is deferring.
     *
     * @return \Tuezy\Contracts\Support\Htmlable|string
     */
    public function resolveDisplayableValue();
}
