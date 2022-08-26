<?php

namespace Tuezy\Contracts\Broadcasting;

interface ShouldBroadcast
{
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Tuezy\Broadcasting\Channel|\Tuezy\Broadcasting\Channel[]|string[]|string
     */
    public function broadcastOn();
}
