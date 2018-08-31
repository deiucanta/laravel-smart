<?php

namespace Deiucanta\Smart\Tests;

use Deiucanta\Smart\ModelGenerator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class ModelGeneratorTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();

        File::delete(app_path('Dumb.php'));
    }

    /** @test */
    public function it_generates_a_model()
    {
        Artisan::call('smart:model', [
            'name' => 'Dumb'
        ]);

        $expected = file_get_contents(__DIR__ . '/Snapshots/Dumb.php');
        $actual = file_get_contents(app_path('Dumb.php'));

        $this->assertEquals($expected, $actual);
        $this->assertEquals("Configuration cache cleared!\nModel Dumb generated.\n", Artisan::output());
    }

    /** @test */
    public function it_throws_an_exception_when_model_already_exists()
    {
        File::put(app_path('Dumb.php'), 'somecontent');

        Artisan::call('smart:model', [
            'name' => 'Dumb'
        ]);

        $this->assertEquals("This model already exists.\n", Artisan::output());
    }
}
