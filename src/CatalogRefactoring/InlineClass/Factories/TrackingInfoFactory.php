<?php

namespace App\CatalogRefactoring\InlineClass\Factories;

class TrackingInfoFactory
{

    public static function make()
    {
        return [
            'shipping_company' => fake()->company(),
            'tracking_number' => fake()->randomNumber(5)
        ];
    }
}
