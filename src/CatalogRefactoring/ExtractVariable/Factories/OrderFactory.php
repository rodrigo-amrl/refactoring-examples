<?php

namespace App\CatalogRefactoring\ExtractVariable\Factories;

class OrderFactory
{

    public static function make()
    {

        return [
            'quantity' => 5,
            'item_price' => 33.50
        ];
    }
}
