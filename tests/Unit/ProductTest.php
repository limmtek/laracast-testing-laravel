<?php

namespace Tests\Unit;

use App\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    protected $product;

    public function setUp(): void
    {
        $this->product = new Product('Fallout', 59);
    }

    /** @test */
    public function a_product_has_a_name()
    {
        $this->assertEquals('Fallout', $this->product->name());
    }

    /** @test */
    public function a_product_has_a_cost()
    {
        $this->assertEquals(59, $this->product->cost());
    }

}
