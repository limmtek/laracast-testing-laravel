<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App
 *
 * @property Product[] $products
 */
class Order extends Model
{
    protected $products = [];

    public function add(Product $product)
    {
        $this->products[] = $product;
    }

    /**
     * @return Product[]
     */
    public function products(): array
    {
        return $this->products;
    }

    public function total(): int
    {
        return array_reduce($this->products(), function ($carry, $product) {
            /** @var Product $product */
            return $carry + $product->cost();
        }, 0);
    }
}
