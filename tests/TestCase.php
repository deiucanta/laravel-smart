<?php
namespace Deiucanta\Smart\Tests;

use Illuminate\Foundation\Application;
use Illuminate\Database\Schema\Blueprint;
use Orchestra\Testbench\TestCase as Orchestra;
use Deiucanta\Smart\SmartServiceProvider;

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