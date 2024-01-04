<?php

namespace App\CatalogRefactoring\ReplacePrimitiveWithObject\Refactored;

class Order
{

    public function __construct(protected string $priority)
    {
    }
}
