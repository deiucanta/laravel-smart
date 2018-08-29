<?php

namespace Deiucanta\Smart\Tests;

use Deiucanta\Smart\SmartServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [SmartServiceProvider::class];
    }
}
