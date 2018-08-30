<?php

namespace Deiucanta\Smart\Tests\Models;

use Deiucanta\Smart\Field;
use Deiucanta\Smart\Model;

class BigBang extends Model
{
    public function fields()
    {
        return [
            Field::make('bigIncrements_field')->bigIncrements(),
            Field::make('bigInteger_field')->bigInteger(),
            Field::make('binary_field')->binary(),
            Field::make('boolean_field')->boolean(),
            Field::make('char_field')->char(2),
            Field::make('date_field')->date(),
            Field::make('dateTime_field')->dateTime(),
            Field::make('dateTimeTz_field')->dateTimeTz(),
            Field::make('decimal_field')->decimal(10, 2),
            Field::make('double_field')->double(6, 2),
            Field::make('email_field')->email(),
            Field::make('enum_field')->enum(['A', 'B', 'C']),
            Field::make('float_field')->float(3, 2),
            Field::make('geometry_field')->geometry(),
            Field::make('geometryCollection_field')->geometryCollection(),
            Field::make('increments_field')->increments(),
            Field::make('integer_field')->integer(),
            Field::make('ipAddress_field')->ipAddress(),
            Field::make('json_field')->json(),
            Field::make('jsonb_field')->jsonb(),
            Field::make('lineString_field')->lineString(),
            Field::make('longText_field')->longText(),
            Field::make('macAddress_field')->macAddress(),
            Field::make('mediumIncrements_field')->mediumIncrements(),
            Field::make('mediumInteger_field')->mediumInteger(),
            Field::make('mediumText_field')->mediumText(),
            Field::make('multiLineString_field')->multiLineString(),
            Field::make('multiPoint_field')->multiPoint(),
            Field::make('multiPolygon_field')->multiPolygon(),
            Field::make('nullable_field')->nullable(),
            Field::make('point_field')->point(),
            Field::make('polygon_field')->polygon(),
            Field::make('smallIncrements_field')->smallIncrements(),
            Field::make('smallInteger_field')->smallInteger(),
            Field::make('softDeletes_field')->softDeletes(),
            Field::make('softDeletesTz_field')->softDeletesTz(),
            Field::make('string_field')->string(20),
            Field::make('text_field')->text(),
            Field::make('time_field')->time(),
            Field::make('timeTz_field')->timeTz(),
            Field::make('timestamp_field')->timestamp(),
            Field::make('timestampTz_field')->timestampTz(),
            Field::make('tinyIncrements_field')->tinyIncrements(),
            Field::make('tinyInteger_field')->tinyInteger(),
            Field::make('unique_field')->unique(),
            Field::make('unsignedBigInteger_field')->unsignedBigInteger(),
            Field::make('unsignedDecimal_field')->unsignedDecimal(20, 2),
            Field::make('unsignedInteger_field')->unsignedInteger(),
            Field::make('unsignedMediumInteger_field')->unsignedMediumInteger(),
            Field::make('unsignedSmallInteger_field')->unsignedSmallInteger(),
            Field::make('unsignedTinyInteger_field')->unsignedTinyInteger(),
            Field::make('slug_field')->slug(),
            Field::make('url_field')->url(),
            Field::make('uuid_field')->uuid(),
            Field::make('year_field')->year(),
        ];
    }
}
