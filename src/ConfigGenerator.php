<?php

namespace Deiucanta\Smart;

class ConfigGenerator extends Generator
{
    public function print($models)
    {
        return $this->joinTree([
            '<?php',
            '',
            'return [',
            [
                "'models' => [",
                    $this->printModelNames($models),
                '],'
            ],
            '];',
        ]);
    }

    protected function printModelNames($models)
    {
        return array_map(function ($model) {
            return var_export($model, true).',';
        }, $models);
    }
}
