<?php

namespace Deiucanta\Smart;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $smartFields = [];
    protected $rawAttributes = [];
    protected $validator = null;

    public function __construct(array $attributes = [])
    {
        $this->initSmartFields();

        parent::__construct($attributes);
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $validator = $model->validate();

            if ($validator->fails()) {
                $response = Response::json($validator->errors());
                throw new ValidationException($validator, $response);
            }
        });

        static::saved(function ($model) {
            $model->resetValidator();
        });
    }

    public function initSmartFields()
    {
        $fields = $this->fields();

        foreach ($fields as $field) {
            $this->smartFields[$field->name] = $field;

            if ($field->fillable === true) {
                $this->fillable[] = $field->name;
            }

            if ($field->guarded === true) {
                $this->guarded[] = $field->name;
            }

            if ($field->cast !== null) {
                $this->casts[$field->name] = $field->cast;
            }

            if ($field->default !== null) {
                $this->setAttribute($field->name, $field->default);
            }
        }
    }

    public function setAttribute($key, $value)
    {
        // model needs to be validated again
        $this->resetValidator();

        if (isset($this->smartFields[$key]) && $this->smartFields[$key]->validateRawValue) {
            $this->rawAttributes[$key] = $value;
        }

        return parent::setAttribute($key, $value);
    }

    protected function getValidatorData($skip = [])
    {
        $values = $rules = [];

        foreach ($this->smartFields as $key => $field) {
            if (in_array($key, $skip)) continue;

            if ($field->validateRawValue && !isset($this->rawAttributes[$key])) continue;

            $fieldRules = $field->getValidationRules($this);

            if (count($fieldRules) === 0) continue;

            $rules[$key] = $fieldRules;
            $values[$key] = isset($this->rawAttributes[$key])
                ? $this->rawAttributes[$key]
                : $this->getAttribute($key);
        }

        return compact('values', 'rules');
    }

    public function validate($skip = [])
    {
        if ($this->validator === null) {
            $data = $this->getValidatorData($skip);
            $this->validator = Validator::make($data['values'], $data['rules']);
        }

        return $this->validator;
    }

    public function resetValidator()
    {
        $this->validator = null;
    }

    // TMP
    public function dump()
    {
        return [
            'casts' => $this->casts,
            'validator' => $this->getValidatorData(),
            'fields' => $this->smartFields,
        ];
    }
}
