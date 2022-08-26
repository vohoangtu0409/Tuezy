<?php

namespace Tuezy\Contracts\Validation;

interface ValidatorAwareRule
{
    /**
     * Set the current validator.
     *
     * @param  \Tuezy\Validation\Validator  $validator
     * @return $this
     */
    public function setValidator($validator);
}
