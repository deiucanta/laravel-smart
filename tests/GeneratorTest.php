<?php

namespace Deiucanta\Smart\Tests;

use Deiucanta\Smart\Generator;
use Illuminate\Validation\ValidationException;

class GeneratorTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    /** @test */
    public function it_joins_array_trees_with_correct_indentation()
    {
        $generator = new Generator();
        $expected = file_get_contents(__DIR__.'/Snapshots/join-tree.txt');
        $input = ['1', '2', ['21', '22', ['221']], '3'];

        $this->assertEquals($generator->joinTree($input), $expected);
    }

    /** @test */
    public function it_joins_sections()
    {
        $generator = new Generator();

        $section1 = ['a', 'b', 'c'];
        $section2 = ['d', 'e', 'f'];
        $expected = ['a', 'b', 'c', '', 'd', 'e', 'f'];

        $this->assertEquals($generator->joinSections([$section1, $section2]), $expected);
    }
}
