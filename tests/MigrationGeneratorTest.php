<?php

namespace Deiucanta\Smart\Tests;

use Deiucanta\Smart\MigrationGenerator;

class MigrationGeneratorTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    /** @test */
    public function it_generates_the_proper_snapshot_1()
    {
        $generator = new MigrationGenerator();
        $expected = file_get_contents(__DIR__.'/Snapshots/migration-1.txt');

        $up = [
            'created' => [
                'Deiucanta\Smart\Tests\Models\Product' => [
                    'created' => [
                        'id' => [
                            'type' => 'increments',
                        ],
                        'created_at' => [
                            'type'     => 'timestamp',
                            'nullable' => true,
                        ],
                        'updated_at' => [
                            'type'     => 'timestamp',
                            'nullable' => true,
                        ],
                    ],
                ],
            ],
        ];

        $down = [
            'deleted' => [
                'Deiucanta\Smart\Tests\Models\Product' => true,
            ],
        ];

        $this->assertEquals($generator->print($up, $down, 'Testing'), $expected);
    }

    /** @test */
    public function it_generates_the_proper_snapshot_2()
    {
        $generator = new MigrationGenerator();
        $expected = file_get_contents(__DIR__.'/Snapshots/migration-2.txt');

        $up = [
            'updated' => [
                'Deiucanta\Smart\Tests\Models\Product' => [
                    'updated' => [
                        'name' => [
                            'type'     => 'string',
                            'nullable' => true,
                            'default'  => 'John Doe',
                        ],
                        'price' => [
                            'type'     => 'decimal',
                            'typeArgs' => [5, 2],
                            'index'    => false,
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals($generator->print($up, [], 'Testing'), $expected);
    }
}
