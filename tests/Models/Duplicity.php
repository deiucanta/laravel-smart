<?php

namespace Deiucanta\Smart\Tests\Models;

use Deiucanta\Smart\Field;
use Deiucanta\Smart\Model;

class Duplicity extends Model
{
    public function fields()
    {
        return [
            Field::make('duplicity_field')->string(),
            Field::make('duplicity_field')->text(),
            Field::make('another_field')->text(),
        ];
    }
}
