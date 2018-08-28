<?php 
namespace Deiucanta\Smart\Tests;

use Deiucanta\Smart\Tests\Models\Product;

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
}