<?php

namespace App\CatalogRefactoring\SplitPhase\Factories;

class OrderFactory
{

    public static function make()
    {
        return [
            'product' => ProductFactory::make(),
            'quantity' => 4,
            'shipping_method' => ShippingMethodFactory::make()
        ];
    }
}
