<?php

namespace App\CatalogRefactoring\InlineFunction\Factories;

class DriverFactory
{

    public static function make()
    {
        return [
            'name' => fake()->name(),
            'number_of_late_deliveries' => 10
        ];
    }
}
