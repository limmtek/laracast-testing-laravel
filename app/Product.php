<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $name;
    protected $cost;

    public function __construct(string $name, int $cost)
    {
        parent::__construct();

        $this->name = $name;
        $this->cost = $cost;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function cost(): int
    {
        return $this->cost;
    }
}
