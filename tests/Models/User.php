<?php

namespace Deiucanta\Smart\Tests\Models;

use Deiucanta\Smart\Authenticable;
use Deiucanta\Smart\Field;

class User extends Authenticable
{
    public function fields()
    {
        return [
            Field::make('id')->increments(),
            Field::make('name')->string()->required()->fillable(),
            Field::make('email')->email()->required()->fillable(),
            Field::make('password')->string()->required(),
            Field::make('created_at')->timestamp()->nullable()->index(),
            Field::make('updated_at')->timestamp()->nullable()->index(),
        ];
    }
}
