<?php

namespace Deiucanta\Smart\Tests;

use Deiucanta\Smart\Tests\Models\BigBang;
use Deiucanta\Smart\Field;

class FieldTypesTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    /** @test */
    public function setup_bigIncrements()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'bigIncrements_field');

        $this->assertEquals($field->type, 'bigIncrements');
        $this->assertEquals($field->cast, 'integer');
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_bigInteger()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'bigInteger_field');

        $this->assertEquals($field->type, 'bigInteger');
        $this->assertEquals($field->cast, 'integer');
        $this->assertEquals($field->rules, ['numeric']);
    }

    /** @test */
    public function setup_binary()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'binary_field');

        $this->assertEquals($field->type, 'binary');
        $this->assertEquals($field->cast, null);
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_boolean()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'boolean_field');

        $this->assertEquals($field->type, 'boolean');
        $this->assertEquals($field->cast, 'boolean');
        $this->assertEquals($field->rules, ['boolean']);
    }

    /** @test */
    public function setup_char()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'char_field');

        $this->assertEquals($field->type, 'char');
        $this->assertEquals($field->cast, null);
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_date()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'date_field');

        $this->assertEquals($field->type, 'date');
        $this->assertEquals($field->cast, 'date');
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_dateTime()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'dateTime_field');

        $this->assertEquals($field->type, 'dateTime');
        $this->assertEquals($field->cast, 'datetime');
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_dateTimeTz()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'dateTimeTz_field');

        $this->assertEquals($field->type, 'dateTimeTz');
        $this->assertEquals($field->cast, 'datetime');
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_decimal()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'decimal_field');

        $this->assertEquals($field->type, 'decimal');
        $this->assertEquals($field->cast, 'double');
        $this->assertEquals($field->rules, ['numeric']);
    }

    /** @test */
    public function setup_double()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'double_field');

        $this->assertEquals($field->type, 'double');
        $this->assertEquals($field->cast, 'double');
        $this->assertEquals($field->rules, ['numeric']);
    }

    /** @test */
    public function setup_email()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'email_field');

        $this->assertEquals($field->type, 'string');
        $this->assertEquals($field->cast, null);
        $this->assertEquals($field->rules, ['email']);
    }

    /** @test */
    public function setup_enum()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'enum_field');

        $this->assertEquals($field->type, 'enum');
        $this->assertEquals($field->cast, null);
        $this->assertEquals($field->rules, ['in:A,B,C']);
    }

    /** @test */
    public function setup_float()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'float_field');

        $this->assertEquals($field->type, 'float');
        $this->assertEquals($field->cast, 'float');
        $this->assertEquals($field->rules, ['numeric']);
    }

    /** @test */
    public function setup_geometry()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'geometry_field');

        $this->assertEquals($field->type, 'geometry');
        $this->assertEquals($field->cast, null);
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_geometryCollection()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'geometryCollection_field');

        $this->assertEquals($field->type, 'geometryCollection');
        $this->assertEquals($field->cast, null);
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_increments()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'increments_field');

        $this->assertEquals($field->type, 'increments');
        $this->assertEquals($field->cast, 'integer');
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_integer()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'integer_field');

        $this->assertEquals($field->type, 'integer');
        $this->assertEquals($field->cast, 'integer');
        $this->assertEquals($field->rules, ['numeric']);
    }

    /** @test */
    public function setup_ipAddress()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'ipAddress_field');

        $this->assertEquals($field->type, 'ipAddress');
        $this->assertEquals($field->cast, null);
        $this->assertEquals($field->rules, ['ip']);
    }

    /** @test */
    public function setup_json()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'json_field');

        $this->assertEquals($field->type, 'json');
        $this->assertEquals($field->cast, 'array');
        $this->assertEquals($field->rules, ['array']);
    }

    /** @test */
    public function setup_jsonb()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'jsonb_field');

        $this->assertEquals($field->type, 'jsonb');
        $this->assertEquals($field->cast, 'array');
        $this->assertEquals($field->rules, ['array']);
    }

    /** @test */
    public function setup_lineString()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'lineString_field');

        $this->assertEquals($field->type, 'lineString');
        $this->assertEquals($field->cast, null);
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_longText()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'longText_field');

        $this->assertEquals($field->type, 'longText');
        $this->assertEquals($field->cast, null);
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_macAddress()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'macAddress_field');

        $this->assertEquals($field->type, 'macAddress');
        $this->assertEquals($field->cast, null);
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_mediumIncrements()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'mediumIncrements_field');

        $this->assertEquals($field->type, 'mediumIncrements');
        $this->assertEquals($field->cast, 'integer');
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_mediumInteger()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'mediumInteger_field');

        $this->assertEquals($field->type, 'mediumInteger');
        $this->assertEquals($field->cast, 'integer');
        $this->assertEquals($field->rules, ['numeric']);
    }

    /** @test */
    public function setup_mediumText()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'mediumText_field');

        $this->assertEquals($field->type, 'mediumText');
        $this->assertEquals($field->cast, null);
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function it_does_not_support_morphs()
    {
        $this->expectException(\Exception::class);
        Field::make('morphs_field')->morphs();
    }

    /** @test */
    public function setup_multiLineString()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'multiLineString_field');

        $this->assertEquals($field->type, 'multiLineString');
        $this->assertEquals($field->cast, null);
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_multiPoint()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'multiPoint_field');

        $this->assertEquals($field->type, 'multiPoint');
        $this->assertEquals($field->cast, null);
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_multiPolygon()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'multiPolygon_field');

        $this->assertEquals($field->type, 'multiPolygon');
        $this->assertEquals($field->cast, null);
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_nullable()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'nullable_field');

        $this->assertEquals($field->type, null);
        $this->assertEquals($field->cast, null);
        $this->assertEquals($field->rules, ['nullable']);
    }

    /** @test */
    public function setup_point()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'point_field');

        $this->assertEquals($field->type, 'point');
        $this->assertEquals($field->cast, null);
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_polygon()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'polygon_field');

        $this->assertEquals($field->type, 'polygon');
        $this->assertEquals($field->cast, null);
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_smallIncrements()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'smallIncrements_field');

        $this->assertEquals($field->type, 'smallIncrements');
        $this->assertEquals($field->cast, 'integer');
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_smallInteger()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'smallInteger_field');

        $this->assertEquals($field->type, 'smallInteger');
        $this->assertEquals($field->cast, 'integer');
        $this->assertEquals($field->rules, ['numeric']);
    }

    /** @test */
    public function setup_softDeletes()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'softDeletes_field');

        $this->assertEquals($field->type, 'softDeletes');
        $this->assertEquals($field->cast, 'datetime');
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_softDeletesTz()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'softDeletesTz_field');

        $this->assertEquals($field->type, 'softDeletesTz');
        $this->assertEquals($field->cast, 'datetime');
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_string()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'string_field');

        $this->assertEquals($field->type, 'string');
        $this->assertEquals($field->cast, null);
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_text()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'text_field');

        $this->assertEquals($field->type, 'text');
        $this->assertEquals($field->cast, null);
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_time()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'time_field');

        $this->assertEquals($field->type, 'time');
        $this->assertEquals($field->cast, null);
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_timeTz()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'timeTz_field');

        $this->assertEquals($field->type, 'timeTz');
        $this->assertEquals($field->cast, null);
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_timestamp()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'timestamp_field');

        $this->assertEquals($field->type, 'timestamp');
        $this->assertEquals($field->cast, 'datetime');
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_timestampTz()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'timestampTz_field');

        $this->assertEquals($field->type, 'timestampTz');
        $this->assertEquals($field->cast, 'datetime');
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function it_does_not_support_timestampsTz()
    {
        $this->expectException(\Exception::class);
        Field::make('timestampsTz_field')->timestampsTz();
    }

    /** @test */
    public function it_does_not_support_timestamps()
    {
        $this->expectException(\Exception::class);
        Field::make('timestamps_field')->timestamps();
    }

    /** @test */
    public function setup_tinyIncrements()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'tinyIncrements_field');

        $this->assertEquals($field->type, 'tinyIncrements');
        $this->assertEquals($field->cast, 'integer');
        $this->assertEquals($field->rules, []);
    }

    /** @test */
    public function setup_tinyInteger()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'tinyInteger_field');

        $this->assertEquals($field->type, 'tinyInteger');
        $this->assertEquals($field->cast, 'integer');
        $this->assertEquals($field->rules, ['numeric']);
    }

    /** @test */
    public function setup_unique()
    {
        $model = new BigBang();
        $model->id = 1;
        $field = collect($model->fields())->firstWhere('name', 'unique_field');

        $rule = $field->getValidationRules($model)[0]->__toString();

        $this->assertEquals($field->type, null);
        $this->assertEquals($field->cast, null);
        $this->assertEquals($rule, 'unique:big_bangs,unique_field,"1",id');
    }

    /** @test */
    public function setup_unsignedBigInteger()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'unsignedBigInteger_field');

        $this->assertEquals($field->type, 'unsignedBigInteger');
        $this->assertEquals($field->cast, 'integer');
        $this->assertEquals($field->rules, ['numeric']);
    }

    /** @test */
    public function setup_unsignedDecimal()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'unsignedDecimal_field');

        $this->assertEquals($field->type, 'unsignedDecimal');
        $this->assertEquals($field->cast, 'double');
        $this->assertEquals($field->rules, ['numeric']);
    }

    /** @test */
    public function setup_unsignedInteger()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'unsignedInteger_field');

        $this->assertEquals($field->type, 'unsignedInteger');
        $this->assertEquals($field->cast, 'integer');
        $this->assertEquals($field->rules, ['numeric']);
    }

    /** @test */
    public function setup_unsignedMediumInteger()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'unsignedMediumInteger_field');

        $this->assertEquals($field->type, 'unsignedMediumInteger');
        $this->assertEquals($field->cast, 'integer');
        $this->assertEquals($field->rules, ['numeric']);
    }

    /** @test */
    public function setup_unsignedSmallInteger()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'unsignedSmallInteger_field');

        $this->assertEquals($field->type, 'unsignedSmallInteger');
        $this->assertEquals($field->cast, 'integer');
        $this->assertEquals($field->rules, ['numeric']);
    }

    /** @test */
    public function setup_unsignedTinyInteger()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'unsignedTinyInteger_field');

        $this->assertEquals($field->type, 'unsignedTinyInteger');
        $this->assertEquals($field->cast, 'integer');
        $this->assertEquals($field->rules, ['numeric']);
    }

    /** @test */
    public function setup_slug()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'slug_field');

        $this->assertEquals($field->type, 'string');
        $this->assertEquals($field->cast, null);
        $this->assertEquals($field->rules, ['regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/']);
    }

    /** @test */
    public function setup_url()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'url_field');

        $this->assertEquals($field->type, 'string');
        $this->assertEquals($field->cast, null);
        $this->assertEquals($field->rules, ['url']);
    }

    /** @test */
    public function setup_uuid()
    {
        $model = new BigBang();
        $field = collect($model->fields())->firstWhere('name', 'uuid_field');

        $this->assertEquals($field->type, 'uuid');
        $this->assertEquals($field->cast, null);
        $this->assertEquals($field->rules, []);
    }
}
