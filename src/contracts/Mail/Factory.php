<?php

namespace Tuezy\Contracts\Mail;

interface Factory
{
    /**
     * Get a mailer instance by name.
     *
     * @param  string|null  $name
     * @return \Tuezy\Contracts\Mail\Mailer
     */
    public function mailer($name = null);
}
