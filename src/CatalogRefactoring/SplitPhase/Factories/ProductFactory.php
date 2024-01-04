<?php

namespace App\CatalogRefactoring\SplitPhase\Factories;

class ProductFactory
{

    public static function make()
    {
        return [
            'name' => 'Product Test',
            'base_price' => 22.20,
            'discount_threshold' => 0.8,
            'discount_rate' => 0.5
        ];
    }
}
