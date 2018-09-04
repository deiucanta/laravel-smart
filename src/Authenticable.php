<?php

namespace Deiucanta\Smart;

class Authenticable extends \Illuminate\Foundation\Auth\User
{
    use SmartModel;

    public function __construct(array $attributes = [])
    {
        $this->initSmartFields();

        parent::__construct($attributes);
    }
}
