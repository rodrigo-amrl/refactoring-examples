<?php

namespace App\CatalogRefactoring\ExtractFunction\Factories;

class InvoiceFactory
{

    public static function make()
    {
        return [
            'customer' => fake()->name(),
            'orders' => [
                ['product' => fake()->name(), 'amount' => 20.56],
                ['product' => fake()->name(), 'amount' => 38.80]
            ]
        ];
    }
}
