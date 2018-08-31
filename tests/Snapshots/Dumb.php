<?php

namespace App;

use Deiucanta\Smart\Field;
use Deiucanta\Smart\Model;

class Dumb extends Model
{
    public function fields()
    {
        return [
            Field::make('id')->increments(),
        ];
    }
}
