<?php

namespace Deiucanta\Smart\Tests;

use Deiucanta\Smart\Tests\Models\Duplicity;
use Deiucanta\Smart\Tests\Models\FieldCaching;
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

    /** @test */
    public function field_names_must_be_unique()
    {
        $this->expectException(\Exception::class);

        $model = new Duplicity();
    }

    /** @test */
    public function it_caches_field_definitions()
    {
        $modelA = new FieldCaching();
        $modelB = new FieldCaching();

        $this->assertEquals($modelA->getSmartFields(), $modelB->getSmartFields());
    }

    /** @test */
    public function it_caches_a_collection_indexed_by_name()
    {
        $model = new FieldCaching();
        $fields = $model->getSmartFields();

        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $fields);
        $this->assertEquals($fields->keys()->toArray(), ['id']);
    }

    /** @test */
    public function it_removes_unknown_attributes()
    {
        $model = new Product();
        $model->junkAttribute = 'x';
        $model->removeUnknownAttributes();

        $this->assertNull($model->junkAttribute);
    }
}
