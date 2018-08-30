<?php

namespace Deiucanta\Smart\Tests;

use Deiucanta\Smart\Tests\Models\OhRule;


class FieldRulesTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    /** @test */
    public function setup_accepted()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'accepted_field');
        $this->assertEquals($field->rules, ['accepted']);
    }

    /** @test */
    public function setup_activeUrl()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'activeUrl_field');
        $this->assertEquals($field->rules, ['active_url']);
    }

    /** @test */
    public function setup_afterOrEqual()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'afterOrEqual_field');
        $this->assertEquals($field->rules, ['after_or_equal:2018-12-31']);
    }

    /** @test */
    public function setup_alpha()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'alpha_field');
        $this->assertEquals($field->rules, ['alpha']);
    }

    /** @test */
    public function setup_alphaDash()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'alphaDash_field');
        $this->assertEquals($field->rules, ['alpha_dash']);
    }

    /** @test */
    public function setup_alphaNum()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'alphaNum_field');
        $this->assertEquals($field->rules, ['alpha_num']);
    }

    /** @test */
    public function setup_array()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'array_field');
        $this->assertEquals($field->rules, ['array']);
    }

    /** @test */
    public function setup_bail()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'bail_field');
        $this->assertEquals($field->rules, ['bail']);
    }

    /** @test */
    public function setup_before()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'before_field');
        $this->assertEquals($field->rules, ['before:2018-12-31']);
    }

    /** @test */
    public function setup_beforeOrEqual()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'beforeOrEqual_field');
        $this->assertEquals($field->rules, ['before_or_equal:2018-12-31']);
    }

    /** @test */
    public function setup_between()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'between_field');
        $this->assertEquals($field->rules, ['between:1,20']);
    }

    /** @test */
    public function setup_confirmed()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'confirmed_field');
        $this->assertEquals($field->rules, ['confirmed']);
    }

    /** @test */
    public function setup_dateEquals()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'dateEquals_field');
        $this->assertEquals($field->rules, ['date_equals:2018-12-31']);
    }

    /** @test */
    public function setup_dateFormat()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'dateFormat_field');
        $this->assertEquals($field->rules, ['date_format:Y-m-d']);
    }

    /** @test */
    public function setup_different()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'different_field');
        $this->assertEquals($field->rules, ['different:somefield']);
    }

    /** @test */
    public function setup_digits()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'digits_field');
        $this->assertEquals($field->rules, ['digits:3']);
    }

    /** @test */
    public function setup_digitsBetween()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'digitsBetween_field');
        $this->assertEquals($field->rules, ['digits_between:5,9']);
    }


    /** @test */
    public function setup_exists()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'exists_field');

        $rule = $field->rules[0]->__toString();

        $this->assertEquals($rule, 'exists:users,exists_field');
    }

    /** @test */
    public function setup_exists_with_column()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'exists_field_with_column');

        $rule = $field->rules[0]->__toString();

        $this->assertEquals($rule, 'exists:users,username');
    }

    /** @test */
    public function setup_exists_full()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'exists_field_full');

        $rule = $field->rules[0];

        $this->assertEquals($rule, 'exists:users,username');
        $this->assertTrue(is_a($rule, 'Illuminate\Validation\Rules\Exists'));
    }

    /** @test */
    public function setup_filled()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'filled_field');
        $this->assertEquals($field->rules, ['filled']);
    }

    /** @test */
    public function setup_gt()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'gt_field');
        $this->assertEquals($field->rules, ['gt:5']);
    }

    /** @test */
    public function setup_gte()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'gte_field');
        $this->assertEquals($field->rules, ['gte:6']);
    }

    /** @test */
    public function setup_in()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'in_field');

        $rule = $field->rules[0]->__toString();

        $this->assertEquals($rule, 'in:"D","E","F"');
    }

    /** @test */
    public function setup_inArray()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'inArray_field');

        $this->assertEquals($field->rules, ['in_array:letters']);
    }

    /** @test */
    public function setup_ip()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'ip_field');
        $this->assertEquals($field->rules, ['ip']);
    }

    /** @test */
    public function setup_ipv4()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'ipv4_field');
        $this->assertEquals($field->rules, ['ipv4']);
    }

    /** @test */
    public function setup_ipv6()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'ipv6_field');
        $this->assertEquals($field->rules, ['ipv6']);
    }

    /** @test */
    public function setup_lt()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'lt_field');
        $this->assertEquals($field->rules, ['lt:10']);
    }

    /** @test */
    public function setup_lte()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'lte_field');
        $this->assertEquals($field->rules, ['lte:11']);
    }

    /** @test */
    public function setup_max()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'max_field');
        $this->assertEquals($field->rules, ['max:12']);
    }

    /** @test */
    public function setup_min()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'min_field');
        $this->assertEquals($field->rules, ['min:13']);
    }

    /** @test */
    public function setup_notIn()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'notIn_field');

        $rule = $field->rules[0]->__toString();

        $this->assertEquals($rule, 'not_in:"Mary","May"');
    }

    /** @test */
    public function setup_notRegex()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'notRegex_field');
        $this->assertEquals($field->rules, ['not_regex:/w+/']);
    }

    /** @test */
    public function setup_numeric()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'numeric_field');
        $this->assertEquals($field->rules, ['numeric']);
    }

    /** @test */
    public function setup_present()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'present_field');
        $this->assertEquals($field->rules, ['present']);
    }

    /** @test */
    public function setup_regex()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'regex_field');
        $this->assertEquals($field->rules, ['regex:/{abc}/']);
    }

    /** @test */
    public function setup_required()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'required_field');
        $this->assertEquals($field->rules, ['required']);
    }

    /** @test */
    public function setup_requiredIf()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'requiredIf_field');
        $this->assertEquals($field->rules, ['required_if:status,ACTIVE']);
    }

    /** @test */
    public function setup_requiredUnless()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'requiredUnless_field');
        $this->assertEquals($field->rules, ['required_unless:status,ARCHIVED']);
    }

    /** @test */
    public function setup_requiredWith()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'requiredWith_field');
        $this->assertEquals($field->rules, ['required_with:a,b,c,d']);
    }

    /** @test */
    public function setup_requiredWithAll()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'requiredWithAll_field');
        $this->assertEquals($field->rules, ['required_with_all:e,f,g,h']);
    }

    /** @test */
    public function setup_requiredWithout()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'requiredWithout_field');
        $this->assertEquals($field->rules, ['required_without:w,x,y,z']);
    }

    /** @test */
    public function setup_requiredWithoutAll()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'requiredWithoutAll_field');
        $this->assertEquals($field->rules, ['required_without_all:l,m,n,o']);
    }

    /** @test */
    public function setup_same()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'same_field');
        $this->assertEquals($field->rules, ['same:password_confirm']);
    }

    /** @test */
    public function setup_timezone()
    {
        $model = new OhRule();

        $field = collect($model->fields())->firstWhere('name', 'timezone_field');
        $this->assertEquals($field->rules, ['timezone']);
    }
}