<?php

namespace Deiucanta\Smart;

use File;
use Illuminate\Console\Command;

class ModelCommand extends Command
{
    protected $signature = 'smart:model {name}';
    protected $description = 'Generate Smart Model';

    public function handle()
    {
        $name = $this->argument('name');

        if (File::exists(app_path($name . '.php'))) {
            $this->error('This model already exists.');

            return false;
        }

        $this->generateModel($name);
        $this->generateConfig($name);
    }

    protected function generateModel($name)
    {
        $generator = new ModelGenerator();

        File::put(app_path($name . '.php'), $generator->print($name));
    }

    protected function generateConfig($name)
    {
        $models = config('smart.models', []);
        $models[] = "App\\$name";

        $generator = new ConfigGenerator();

        File::put(config_path('smart.php'), $generator->print($models));

        $this->call('config:clear');
        $this->info("Model {$name} generated.");
    }
}
