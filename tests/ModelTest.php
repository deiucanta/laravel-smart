<?php

namespace Deiucanta\Smart\Tests;

use Deiucanta\Smart\Tests\Models\Product;
use Illuminate\Validation\ValidationException;

class ModelTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    /** @test */
    public function it_handles_guarded_attributes()
    {
        $product = new Product();

        $this->assertArraySubset($product->getGuarded(), ['*', 'sku', 'name']);
    }

    /** @test */
    public function it_handles_fillable_attributes()
    {
        $product = new Product();

        $this->assertArraySubset($product->getFillable(), ['price', 'description']);
    }

    /** @test */
    public function it_handles_default_value()
    {
        $product = new Product();

        $this->assertEquals($product->status, 'ACTIVE');
    }

    /** @test */
    public function it_handles_casting()
    {
        $product = new Product();

        $this->assertEquals($product->getCasts()['valid_until'], 'date');
    }

    /** @test */
    public function it_validates_when_saving()
    {
        try {
            $product = new Product();
            $product->save();
        } catch (ValidationException $e) {
            $this->assertArraySubset(array_keys($e->errors()), ['sku', 'name', 'price']);
        }
    }
}
