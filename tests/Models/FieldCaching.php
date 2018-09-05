<?php

namespace Deiucanta\Smart\Tests\Models;

use Deiucanta\Smart\Field;
use Deiucanta\Smart\Model;

class FieldCaching extends Model
{
    protected $fieldsMethodWasCalled = false;

    public function fields()
    {
        if ($this->fieldsMethodWasCalled === false) {
            $this->fieldsMethodWasCalled = true;

            // first time
            return [
                Field::make('id'),
            ];
        } else {
            // second time
            return [
                Field::make('id'),
                Field::make('name'),
            ];
        }
    }
}
