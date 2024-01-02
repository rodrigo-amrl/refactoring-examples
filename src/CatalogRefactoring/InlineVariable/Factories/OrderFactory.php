<?php

namespace App\CatalogRefactoring\InlineVariable\Factories;

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
