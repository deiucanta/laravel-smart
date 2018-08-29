<?php

namespace Deiucanta\Smart;

use File;
use Illuminate\Console\Command;

class MigrationCommand extends Command
{
    protected $signature = 'smart:migration';
    protected $description = 'Generate Smart Migration';

    protected $analyzer;
    protected $generator;

    public function handle()
    {
        $this->analyzer = new MigrationAnalyzer();
        $this->generator = new MigrationGenerator();

        $newData = $this->getNewData();
        $oldData = $this->getOldData();

        $up = $this->analyzer->diff($oldData, $newData);
        $down = $this->analyzer->diff($newData, $oldData);

        if ($up && $down) {
            $time = time();
            File::put(
                database_path('migrations/'.date('Y_m_d_His').'_smart_migration_'.$time.'.php'),
                $this->generator->print($up, $down, 'SmartMigration'.$time)
            );
            $this->saveData($newData);
        } else {
            $this->info('No changes.');
        }
    }

    protected function getNewData()
    {
        $models = config('smart.models');

        return $this->analyzer->scan($models);
    }

    protected function getOldData()
    {
        $path = database_path('smart.json');

        if (File::exists($path)) {
            $content = File::get($path);

            return json_decode($content, true);
        }

        return [];
    }

    protected function saveData($data)
    {
        $path = database_path('smart.json');
        $content = json_encode($data, JSON_PRETTY_PRINT);

        File::put($path, $content);
    }
}
