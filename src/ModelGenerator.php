<?php

namespace Deiucanta\Smart;

class ModelGenerator extends Generator
{
    public function print($name)
    {
        return $this->joinTree([
            '<?php',
            '',
            'namespace App;',
            '',
            "use Deiucanta\Smart\Field;",
            "use Deiucanta\Smart\Model;",
            '',
            "class {$name} extends Model",
            '{',
            [
                'public function fields()',
                '{',
                [
                    'return [',
                    [
                        "Field::make('id')->increments(),",
                    ],
                    '];',
                ],
                '}',
            ],
            '}',
            '',
        ]);
    }
}
