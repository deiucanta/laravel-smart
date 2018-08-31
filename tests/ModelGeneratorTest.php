<?php

namespace Deiucanta\Smart\Tests;

use Deiucanta\Smart\ModelGenerator;
use Illuminate\Validation\ValidationException;

class ModelGeneratorTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    /** @test */
    public function it_generates_the_proper_snapshot()
    {
        $generator = new ModelGenerator();
        $expected = file_get_contents(__DIR__.'/Snapshots/model.txt');

        $this->assertEquals($generator->print('Product'), $expected);
    }
}
