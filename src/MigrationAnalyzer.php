<?php

namespace Deiucanta\Smart;

class MigrationAnalyzer
{
    public function scan($models)
    {
        $data = [];

        foreach ($models as $model) {
            $data[$model] = [];

            $instance = new $model();
            $fields = $instance->fields();

            foreach ($fields as $field) {
                $name = $field->name;
                $data[$model][$name] = $field->getSchemaData();
            }
        }

        return $data;
    }

    public function diff($oldData, $newData)
    {
        $created = $updated = $deleted = [];

        foreach ($newData as $model => $fields) {
            if (isset($oldData[$model]) === false) {
                $created[$model] = $this->modelDiff([], $fields);
            } else {
                $diff = $this->modelDiff($oldData[$model], $newData[$model]);
                if ($diff) {
                    $updated[$model] = $diff;
                }
            }
        }

        foreach ($oldData as $model => $fields) {
            if (isset($newData[$model]) === false) {
                $deleted[$model] = true;
            }
        }

        //

        $result = [];

        if (count($created)) {
            $result['created'] = $created;
        }
        if (count($updated)) {
            $result['updated'] = $updated;
        }
        if (count($deleted)) {
            $result['deleted'] = $deleted;
        }

        return count($result) ? $result : null;
    }

    protected function modelDiff($oldFields, $newFields)
    {
        $created = $updated = $deleted = [];

        foreach ($newFields as $name => $field) {
            if (isset($oldFields[$name]) === false) {
                $created[$name] = $field;
            } else {
                $diff = $this->fieldDiff($oldFields[$name], $field);
                if ($diff) {
                    $updated[$name] = $diff;
                }
            }
        }

        foreach ($oldFields as $name => $field) {
            if (isset($newFields[$name]) === false) {
                $deleted[$name] = true;
            }
        }

        //

        $result = [];

        if (count($created)) {
            $result['created'] = $created;
        }
        if (count($updated)) {
            $result['updated'] = $updated;
        }
        if (count($deleted)) {
            $result['deleted'] = $deleted;
        }

        return count($result) ? $result : null;
    }

    protected function fieldDiff($oldField, $newField)
    {
        ksort($oldField);
        ksort($newField);

        if ($oldField === $newField) {
            return;
        }

        $output = [];

        if (isset($newField['type'])) {
            $output['type'] = $newField['type'];
        }
        if (isset($newField['typeArgs'])) {
            $output['typeArgs'] = $newField['typeArgs'];
        }

        if (isset($newField['default'])) {
            $output['default'] = $newField['default'];
        }
        if (isset($newField['nullable'])) {
            $output['nullable'] = $newField['nullable'];
        }
        if (isset($newField['unsigned'])) {
            $output['unsigned'] = $newField['unsigned'];
        }

        if (isset($newField['index']) && !isset($oldField['index'])) {
            $output['index'] = true;
        }
        if (!isset($newField['index']) && isset($oldField['index'])) {
            $output['index'] = false;
        }

        if (isset($newField['unique']) && !isset($oldField['unique'])) {
            $output['unique'] = true;
        }
        if (!isset($newField['unique']) && isset($oldField['unique'])) {
            $output['unique'] = false;
        }

        if (isset($newField['primary']) && !isset($oldField['primary'])) {
            $output['primary'] = true;
        }
        if (!isset($newField['primary']) && isset($oldField['primary'])) {
            $output['primary'] = false;
        }

        return $output;
    }
}
