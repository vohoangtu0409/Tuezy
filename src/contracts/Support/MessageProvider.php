<?php

namespace Tuezy\Contracts\Support;

interface MessageProvider
{
    /**
     * Get the messages for the instance.
     *
     * @return \Tuezy\Contracts\Support\MessageBag
     */
    public function getMessageBag();
}
