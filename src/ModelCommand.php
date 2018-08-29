<?php

namespace Deiucanta\Smart;

use File;
use Illuminate\Console\Command;

class ModelCommand extends Command
{
    protected $signature = 'smart:model {name}';
    protected $description = 'Generate Smart Model';

    protected $generator;

    public function handle()
    {
        $this->generator = new ModelGenerator();
        $name = $this->argument('name');

        File::put(
            app_path($name.'.php'),
            $this->generator->print($name)
        );
    }
}
