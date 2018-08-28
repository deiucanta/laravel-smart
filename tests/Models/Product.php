<?php

namespace Deiucanta\Smart\Tests\Models;

use Deiucanta\Smart\Field;
use Deiucanta\Smart\Model;

class Product extends Model
{
  public function fields()
  {
    return [
      Field::make('id')->increments(),
      Field::make('sku')->string()->required()->unique()->guarded(),
      Field::make('name')->string()->required()->guarded(),
      Field::make('price')->decimal(6, 2)->fillable()->required()->min(0),
      Field::make('description')->text()->fillable()->nullable(),
      Field::make('created_at')->timestamp()->nullable()->index(),
      Field::make('updated_at')->timestamp()->nullable()->index(),
    ];
  }
}