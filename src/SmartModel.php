<?php

namespace Deiucanta\Smart;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

trait SmartModel
{
    protected static $smartFields = [];

    protected $rawAttributes = [];
    protected $validator = null;

    protected static function bootSmartModel()
    {
        static::saving(function ($model) {
            $model->removeUnknownAttributes();
        });

        static::saving(function ($model) {
            $validator = $model->validate();

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }
        });

        static::saved(function ($model) {
            $model->resetValidator();
        });
    }

    public function getSmartFields()
    {
        if (!isset(static::$smartFields[static::class])) {
            $fields = collect();

            foreach ($this->fields() as $field) {
                if ($fields->has($field->name)) {
                    throw new \Exception("Field names must be unique. Duplicity on '{$field->name}'.");
                }

                $fields->put($field->name, $field);
            }

            static::$smartFields[static::class] = $fields;
        }

        return static::$smartFields[static::class];
    }

    protected function initSmartFields()
    {
        $fields = $this->getSmartFields();

        foreach ($fields as $field) {
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

        $fields = $this->getSmartFields();

        if ($fields->has($key) && $fields->get($key)->validateRawValue) {
            $this->rawAttributes[$key] = $value;
        }

        return parent::setAttribute($key, $value);
    }

    protected function getValidatorData($skip = [])
    {
        $values = $rules = $labels = [];
        $fields = $this->getSmartFields();

        foreach ($fields as $key => $field) {
            if (in_array($key, $skip)) {
                continue;
            }

            if ($field->validateRawValue && !isset($this->rawAttributes[$key])) {
                continue;
            }

            $fieldRules = $field->getValidationRules($this);

            if (count($fieldRules) === 0) {
                continue;
            }

            $rules[$key] = $fieldRules;

            $values[$key] = isset($this->rawAttributes[$key])
                ? $this->rawAttributes[$key]
                : $this->getAttribute($key);

            $labels[$key] = isset($field->label) ? $field->label : $key;
        }

        return compact('values', 'rules', 'labels');
    }

    public function validate($skip = [])
    {
        if ($this->validator === null) {
            $data = $this->getValidatorData($skip);
            $this->validator = Validator::make($data['values'], $data['rules']);
            $this->validator->setAttributeNames($data['labels']);
        }

        return $this->validator;
    }

    public function resetValidator()
    {
        $this->validator = null;
    }

    public function removeUnknownAttributes()
    {
        $keys = array_keys($this->attributes);
        $fields = $this->getSmartFields();

        foreach ($keys as $key) {
            if (!$fields->has($key)) {
                unset($this->$key);
            }
        }
    }
}
