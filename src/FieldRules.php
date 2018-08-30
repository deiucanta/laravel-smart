<?php

namespace Deiucanta\Smart;

use Illuminate\Validation\Rule;

trait FieldRules
{
    public function accepted()
    {
        return $this->rule('accepted');
    }

    public function activeUrl()
    {
        return $this->rule('active_url');
    }

    public function after($date)
    {
        return $this->rule("after:$date");
    }

    public function afterOrEqual($date)
    {
        return $this->rule("after_or_equal:$date");
    }

    public function alpha()
    {
        return $this->rule('alpha');
    }

    public function alphaDash()
    {
        return $this->rule('alpha_dash');
    }

    public function alphaNum()
    {
        return $this->rule('alpha_num');
    }

    public function array()
    {
        return $this->rule('array');
    }

    public function bail()
    {
        return $this->rule('bail');
    }

    public function before($date)
    {
        return $this->rule("before:$date");
    }

    public function beforeOrEqual($date)
    {
        return $this->rule("before_or_equal:$date");
    }

    public function between($min, $max)
    {
        return $this->rule("between:$min,$max");
    }

    // boolean is in FieldTypes

    public function confirmed()
    {
        return $this->rule('confirmed');
    }

    // date is in FieldTypes

    public function dateEquals($date)
    {
        return $this->rule("date_equals:$date");
    }

    public function dateFormat($format)
    {
        return $this->rule("date_format:$format");
    }

    public function different($field)
    {
        return $this->rule("different:$field");
    }

    public function digits($value)
    {
        return $this->rule("digits:$value");
    }

    public function digitsBetween($min, $max)
    {
        return $this->rule("digits_between:$min,$max");
    }

    public function dimensions()
    {
        throw new Exception('`dimensions` is not supported');
    }

    public function distinct()
    {
        throw new Exception('`distinct` is not supported');
    }

    // email is in FieldTypes

    public function exists($table, $column = null, $where = null)
    {
        if (strpos($table, '\\') !== false) {
            $instance = new $table();
            $table = $instance->getTable();
        }

        if ($column === null) {
            $column = $this->name;
        }

        $rule = Rule::exists($table, $column);

        if ($where) {
            $rule->where($where);
        }

        return $this->rule($rule);
    }

    public function file()
    {
        throw new Exception('`file` is not supported');
    }

    public function filled()
    {
        return $this->rule('filled');
    }

    public function gt($field)
    {
        return $this->rule("gt:$field");
    }

    public function gte($field)
    {
        return $this->rule("gte:$field");
    }

    public function image()
    {
        throw new Exception('`image` is not supported');
    }

    public function in($values)
    {
        return $this->rule(Rule::in($values));
    }

    public function inArray($field)
    {
        return $this->rule("in_array:$field");
    }

    // integer is in FieldTypes

    public function ip()
    {
        return $this->rule('ip');
    }

    public function ipv4()
    {
        return $this->rule('ipv4');
    }

    public function ipv6()
    {
        return $this->rule('ipv6');
    }

    // json is in FieldTypes

    public function lt($field)
    {
        return $this->rule("lt:$field");
    }

    public function lte($field)
    {
        return $this->rule("lte:$field");
    }

    public function max($value)
    {
        return $this->rule("max:$value");
    }

    public function mimeTypes()
    {
        throw new Exception('`mimetypes` is not supported');
    }

    public function mimes()
    {
        throw new Exception('`mimes` is not supported');
    }

    public function min($value)
    {
        return $this->rule("min:$value");
    }

    public function notIn($values)
    {
        return $this->rule(Rule::notIn($values));
    }

    public function notRegex($pattern)
    {
        return $this->rule("not_regex:$pattern");
    }

    // nullable is in Field

    public function numeric()
    {
        return $this->rule('numeric');
    }

    public function present()
    {
        return $this->rule('present');
    }

    public function regex($pattern)
    {
        return $this->rule("regex:$pattern");
    }

    public function required()
    {
        return $this->rule('required');
    }

    public function requiredIf($field, $value)
    {
        return $this->rule("required_if:$field,$value");
    }

    public function requiredUnless($field, $value)
    {
        return $this->rule("required_unless:$field,$value");
    }

    public function requiredWith($fields)
    {
        return $this->rule('required_with:'.implode(',', $fields));
    }

    public function requiredWithAll($fields)
    {
        return $this->rule('required_with_all:'.implode(',', $fields));
    }

    public function requiredWithout($fields)
    {
        return $this->rule('required_without:'.implode(',', $fields));
    }

    public function requiredWithoutAll($fields)
    {
        return $this->rule('required_without_all:'.implode(',', $fields));
    }

    public function same($field)
    {
        return $this->rule("same:$field");
    }

    // string is in FieldTypes

    public function timezone()
    {
        return $this->rule('timezone');
    }

    // unique is in Field

    // url is in FieldTypes
}
