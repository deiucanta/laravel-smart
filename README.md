# Laravel Smart

![Laravel Smart Demo](https://i.imgur.com/MTFSm9b.gif)

**Do not use this package in production!**

1. This is a proof of concept. (update: this package is used succesfully in an app that has 25 models)
2. The code is not unit tested. (update: thanks to @robsontenorio we have basic unit testing)
3. The API is not stable.

I release this alpha version to get feedback on the API and to make sure I'm not missing important use cases.

Also, I cannot build this alone! I'm more than happy to receive help from the community. Don't be shy!

- join the discussions (even if it's not your issue)
- improve the documentation (if you found something hard to understand, raise an issue, send a pull-request, etc)
- contribute with code (I will guide you as much as needed)

---

## Idea

If you define the fields in the model you can get

- **automatic migrations**
- automatic validation on `save()`
- grouped field definition (name, schema type, casting, fillable/guarded, validation rules, schema modifiers, schema indexes)

```php
<?php

namespace App;

use Deiucanta\Smart\Field;
use Deiucanta\Smart\Model;

class Product extends Model
{
    public function fields()
    {
        return [
            Field::make('id')->increments(),
            Field::make('sku')->string()->fillable()->required()->unique(),
            Field::make('name')->string()->fillable()->required(),
            Field::make('price')->decimal(6, 2)->fillable()->required()->min(0),
            Field::make('description')->text()->fillable()->nullable(),
            Field::make('created_at')->timestamp()->nullable()->index(),
            Field::make('updated_at')->timestamp()->nullable()->index(),
        ];
    }
}
```

## Instalation

To install the package, just run

```
composer require deiucanta/smart
```

## Usage

Create a Smart model

```
php artisan smart:model Product
```

Include the model in the config file (`config/smart.php`)

> Note: this is now done automatically when you create the model.

```php
<?php

return [
    'models' => [
        \App\Product::class,
    ]
];
```

Create a Smart migration

```
php artisan smart:migration
```

You should be able to see a new migration in your migration directory. To apply the migration you just run `php artisan migrate` as usual.

You will find a new file called `smart.json` in the `database` directory of your app. That is where the package stores the current state of the database/models. If you delete that file and run `php artisan smart:migration` it will create a new migration as if the schema was empty.

## API

These are the primitives with which you should be able to create any kind of field. However, there are some smarter methods which you can use.

### Base methods

| Method | Description |
| - | - |
| `type($type, $args)` | Set the `type` to be used in migrations |
| `cast($cast)` | Set the `cast` type |
| `rule($rule)` | Add a validation rule (Laravel format) |
| `guarded()` | Make the field guarded |
| `fillable()` | Make the field fillable |
| `index()` | Add simple index on this field in migration |
| `unique($where)` | Add a unique index in migration and a smart validation rule that ignores the current model id |
| `primary()` | Add a primary on this field in migration |
| `default($default)` | Sets the default value in migration and sets the model attribute when you instantiate the model |
| `nullable()` | Make the field nullable in migration and also adds the `nullable` validation rule |
| `unsigned()` | Add the `unsigned` modifier in the migration |

### Type Methods

These are Laravel types that are currently supported.

| Method | Type | Cast | Rule |
| - | - | - | - |
| `bigIncrements()` | `bigIncrements` | `integer` | - |
| `bigInteger()` | `bigInteger` | `integer` | `numeric` |
| `binary()` | `binary` | - | - |
| `boolean()` | `boolean` | `boolean` | `boolean` |
| `char($size = null)` | `char` | - | - |
| `date()` | `date` | `date` | - |
| `dateTime()` | `dateTime` | `datetime` | - |
| `dateTimeTz()` | `dateTimeTz` | `datetime` | - |
| `decimal($total, $decimal)` | `decimal` | `double` | `numeric` |
| `double($total, $decimal)` | `double` | `double` | `numeric` |
| `enum($values)` | `enum` | - | `in:value1,value2,...` |
| `float($total, $decimal)` | `float` | `float` | `numeric` |
| `geometry()` | `geometry` | - | - |
| `geometryCollection()` | `geometryCollection` | - | - |
| `increments()` | `increments` | `integer` | - |
| `integer()` | `integer` | `integer` | `numeric` |
| `ipAddress()` | `ipAddress` | - | `ip` |
| `json()` | `json` | `array` | `array` |
| `jsonb()` | `jsonb` | `array` | `array` |
| `lineString()` | `lineString` | - | - |
| `longText()` | `longText` | - | - |
| `macAddress()` | `macAddress` | - | - |
| `mediumIncrements()` | `mediumIncrements` | `integer` | - |
| `mediumInteger()` | `mediumInteger` | `integer` | `numeric` |
| `mediumText()` | `mediumText` | - | - |
| `multiLineString()` | `multiLineString` | - | - |
| `multiPoint()` | `multiPoint` | - | - |
| `multiPolygon()` | `multiPolygon` | - | - |
| `point()` | `point` | - | - |
| `polygon()` | `polygon` | - | - |
| `smallIncrements()` | `smallIncrements` | `integer` | - |
| `smallInteger()` | `smallInteger` | `integer` | `numeric` |
| `softDeletes()` | `softDeletes` | `datetime` | - |
| `softDeletesTz()` | `softDeletesTz` | `datetime` | - |
| `string($size = null)` | `string` | - | - |
| `text()` | `text` | - | - |
| `time()` | `time` | - | - |
| `timeTz()` | `timeTz` | - | - |
| `timestamp()` | `timestamp` |  `datetime` | - |
| `timestampTz()` | `timestampTz` | `datetime` | - |
| `tinyIncrements()` | `tinyIncrements` | `integer` | - |
| `tinyInteger()` | `tinyInteger` | `integer` | `numeric` |
| `unsignedBigInteger()` | `unsignedBigInteger` | `integer` | `numeric` |
| `unsignedDecimal($total, $decimal)` | `unsignedDecimal` | `double` | `numeric` |
| `unsignedInteger()` | `unsignedInteger` | `integer` | `numeric` |
| `unsignedMediumInteger()` | `unsignedMediumInteger` | `integer` | `numeric` |
| `unsignedSmallInteger()` | `unsignedSmallInteger` | `integer` | `numeric` |
| `unsignedTinyInteger()` | `unsignedTinyInteger` | `integer` | `numeric` |
| `uuid()` | `uuid` | - | - |
| `year()` | `year` | `integer` | `numeric` |

Here are some custom types just as an example of what can be done.

| Method | Type | Cast | Rule |
| - | - | - | - |
| `email()` | `string` | - | `email` |
| `url()` | `string` | - | `url` |
| `slug()` | `string` | - | `regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/` |

### Rule Methods

| Method | Type | Cast | Rule |
| - | - | - | - |
| `accepted()` | - | - | `accepted` |
| `activeUrl()` | - | - | `active_url` |
| `after($date)` | - | - | `after:$date` |
| `afterOrEqual($date)` | - | - | `after_or_equal:$date` |
| `alpha()` | - | - | `alpha` |
| `alphaDash()` | - | - | `alpha_dash` |
| `alphaNum()` | - | - | `alpha_num` |
| `array()` | - | - | `array` |
| `bail()` | - | - | `bail` |
| `before($date)` | - | - | `before:$date` |
| `beforeOrEqual($date)` | - | - | `before_or_equal:$date` |
| `between($min, $max)` | - | - | `between:$min,$max` |
| `confirmed()` | - | - | `confirmed` |
| `dateEquals($date)` | - | - | `date_equals:$date` |
| `dateFormat($format)` | - | - | `date_format:$format` |
| `different($field)` | - | - | `different:$field` |
| `digits($value)` | - | - | `digits:$value` |
| `digitsBetween($min, $max)` | - | - | `digits_between:$min,$max` |
| `exists($table, $column, $where)` | - | - | `Rule::exists(...)` |
| `filled()` | - | - | `filled` |
| `gt($field)` | - | - | `gt:$field` |
| `gte($field)` | - | - | `gte:$field` |
| `in($values)` | - | - | `Rule::in($values)` |
| `inArray($field)` | - | - | `in_array:$field` |
| `ip()` | - | - | `ip` |
| `ipv4()` | - | - | `ipv4` |
| `ipv6()` | - | - | `ipv6` |
| `lt($field)` | - | - | `lt:$field` |
| `lte($field)` | - | - | `lte:$field` |
| `max($value)` | - | - | `max:$value` |
| `min($value)` | - | - | `min:$value` |
| `notIn($values)` | - | - | `value` |
| `notRegex($pattern)` | - | - | `not_regex:$pattern` |
| `numeric()` | - | - | `numeric` |
| `present()` | - | - | `present` |
| `regex($pattern)` | - | - | `regex:$pattern` |
| `required()` | - | - | `required` |
| `requiredIf($field, $value)` | - | - | `required_if:$field,$value` |
| `requiredUnless($field, $value)` | - | - | `required_unless:$field,$value` |
| `requiredWith($fields)` | - | - | `required_with:$fields[0],$fields[1],...` |
| `requiredWithAll($fields)` | - | - | `required_with_all:$fields[0],$fields[1],...` |
| `requiredWithout($fields)` | - | - | `required_without:$fields[0],$fields[1],...` |
| `requiredWithoutAll($fields)` | - | - | `required_without_all:$fields[0],$fields[1],...` |
| `same($field)` | - | - | `same:$field` |
| `timezone()` | - | - | `timezone` |

## Extra

- an article I wrote about this idea a couple of months ago (https://medium.com/@deiucanta/make-laravel-fluent-again-with-smartfields-7d543e725365)
