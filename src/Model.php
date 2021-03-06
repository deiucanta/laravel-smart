<?php

namespace Deiucanta\Smart;

class Model extends \Illuminate\Database\Eloquent\Model
{
    use SmartModel;

    public function __construct(array $attributes = [])
    {
        $this->initSmartFields();

        parent::__construct($attributes);
    }
}
