<?php

namespace Deiucanta\Smart;

use Exception;
use Illuminate\Validation\Rule;

class Field
{
    use FieldTypes, FieldRules;

    public $name;

    public $type;
    public $typeArgs = [];

    public $cast;
    public $rules = [];

    public $guarded = false;
    public $fillable = false;

    public $index = null;
    public $unique = null;
    public $primary = null;
    public $nullable = null;
    public $unsigned = null;

    public $default = null;

    public $uniqueClosure;
    public $validateRawValue;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public static function make($name)
    {
        return new static($name);
    }

    public function type($type, $typeArgs = [])
    {
        $this->type = $type;
        $this->typeArgs = $typeArgs;

        return $this;
    }

    public function cast($cast)
    {
        $this->cast = $cast;

        return $this;
    }

    public function rule($rule)
    {
        $this->rules[] = $rule;

        return $this;
    }

    public function guarded()
    {
        $this->guarded = true;

        return $this;
    }

    public function fillable()
    {
        $this->fillable = true;

        return $this;
    }

    public function index()
    {
        $this->index = true;

        return $this;
    }

    public function unique($uniqueClosure = null)
    {
        $this->unique = true;
        $this->uniqueClosure = $uniqueClosure;

        return $this;
    }

    public function primary()
    {
        $this->primary = true;

        return $this;
    }

    public function default($default)
    {
        $this->default = $default;

        return $this;
    }

    public function nullable()
    {
        $this->nullable = true;
        $this->rule('nullable');

        return $this;
    }

    public function unsigned()
    {
        $this->unsigned = true;
        $this->rule('min:0');

        return $this;
    }

    public function validateRawValue()
    {
        $this->validateRawValue = true;

        return $this;
    }

    public function getValidationRules($model)
    {
        $rules = $this->rules;

        if ($this->unique) {
            $rules[] = $this->makeUniqueRule($model);
        }

        return $rules;
    }

    public function getSchemaData()
    {
        $output = [];

        $output['type'] = $this->type;
        $output['typeArgs'] = $this->typeArgs;

        if ($this->index) $output['index'] = $this->index;
        if ($this->unique) $output['unique'] = $this->unique;
        if ($this->primary) $output['primary'] = $this->primary;

        if ($this->default) $output['default'] = $this->default;

        if ($this->nullable) $output['nullable'] = $this->nullable;
        if ($this->unsigned) $output['unsigned'] = $this->unsigned;

        return $output;
    }
}
