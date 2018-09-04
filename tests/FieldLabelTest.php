<?php

namespace Deiucanta\Smart\Tests;

use Deiucanta\Smart\Tests\Models\Product;
use Illuminate\Validation\ValidationException;

class FieldLabelTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    /** @test */
    public function setup_label()
    {
        $model = new Product();

        $field = collect($model->fields())->firstWhere('name', 'sku');
        $this->assertEquals($field->label, 'Sku Number');
    }

    /** @test */
    public function it_displays_proper_label_on_validation_errors_bag()
    {
        try {
            $product = new Product();
            $product->save();
        } catch (ValidationException $e) {
            $this->assertContains('Sku Number', $e->validator->errors()->first('sku'));
        }
    }
}
