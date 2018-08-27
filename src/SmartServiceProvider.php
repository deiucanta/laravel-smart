<?php

namespace Deiucanta\Smart;

use Illuminate\Support\ServiceProvider;

class SmartServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ModelCommand::class,
                MigrationCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__.'/config/smart.php' => config_path('smart.php'),
        ]);
    }

    public function register()
    {
        //
    }
}
