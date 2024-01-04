<?php

namespace App\CatalogRefactoring\SplitPhase\Factories;

class ShippingMethodFactory
{

    public static function make()
    {
        return [
            'method' => 'normal',
            'fee_per_case' => 3.2,
            'discount_threshold' => 0.8,
            'discounted_fee' => 1.2
        ];
    }
}
