<?php

namespace Deiucanta\Smart;

class MigrationGenerator extends Generator
{
    public function print($up, $down, $name)
    {
        return $this->joinTree([
            "<?php",
            "",
            "use Illuminate\Support\Facades\Schema;",
            "use Illuminate\Database\Schema\Blueprint;",
            "use Illuminate\Database\Migrations\Migration;",
            "",
            "class $name extends Migration",
            "{",
            $this->joinSections([
                $this->printMethod('up', $up),
                $this->printMethod('down', $down),
            ]),
            "}",
            "",
        ]);
    }

    protected function printMethod($name, $data)
    {
        return [
            "public function {$name}()",
            "{",
            $this->joinSections([
                $this->printCreatedModels($data),
                $this->printUpdatedModels($data),
                $this->printDeletedModels($data),
            ]),
            "}",
        ];
    }

    protected function printCreatedModels($data)
    {
        if (!isset($data['created'])) return null;

        $output = [];

        foreach ($data['created'] as $model => $fields) {
            $instance = new $model;
            $table = $instance->getTable();

            $output[] = [
                "Schema::create('{$table}', function (Blueprint \$table) {",
                $this->printFields($fields),
                "});"
            ];
        }

        return $this->joinSections($output);
    }

    protected function printUpdatedModels($data)
    {
        if (!isset($data['updated'])) return null;

        $output = [];

        foreach ($data['updated'] as $model => $fields) {
            $instance = new $model;
            $table = $instance->getTable();

            $output[] = [
                "Schema::table('{$table}', function (Blueprint \$table) {",
                $this->printFields($fields),
                "});"
            ];
        }

        return $this->joinSections($output);
    }

    protected function printDeletedModels($data)
    {
        if (!isset($data['deleted'])) return null;

        $output = [];

        foreach ($data['deleted'] as $model => $fields) {
            $instance = new $model;
            $table = $instance->getTable();

            $output[] = [
                "Schema::drop('{$table}');"
            ];
        }

        return $this->joinSections($output);
    }

    protected function printFields($fields)
    {
        $output = [];

        if (isset($fields['created'])) {
            foreach ($fields['created'] as $name => $data) {
                $output[] = $this->printField($name, $data) . ';';
            }
        }

        if (isset($fields['updated'])) {
            foreach ($fields['updated'] as $name => $data) {
                $output[] = $this->printField($name, $data) . '->change();';
            }
        }

        if (isset($fields['deleted'])) {
            foreach ($fields['deleted'] as $name => $field) {
                $output[] = "\$table->dropColumn('{$name}');";
            }
        }

        return $output;
    }

    protected function printField($name, $data)
    {
        $output = "\$table->" . $this->printFieldType($data['type'], $name, $data['typeArgs']);

        if (isset($data['index'])) $output .= '->index(' . json_encode($data['index']) . ')';
        if (isset($data['unique'])) $output .= '->unique(' . json_encode($data['unique']) . ')';
        if (isset($data['default'])) $output .= '->default(' . json_encode($data['default']) . ')';
        if (isset($data['primary'])) $output .= '->primary(' . json_encode($data['primary']) . ')';
        if (isset($data['unsigned'])) $output .= '->unsigned(' . json_encode($data['unsigned']) . ')';
        if (isset($data['nullable'])) $output .= '->nullable(' . json_encode($data['nullable']) . ')';

        return $output;
    }

    protected function printFieldType($type, $name, $args = [])
    {
        array_unshift($args, $name);

        return $type . '(' . implode(', ', array_map('json_encode', $args)) . ')';
    }
}
