<?php

namespace App\CatalogRefactoring\InlineFunction\Factories;

class CustomerFactory
{

    public static function make()
    {
        return [
            'name' => fake()->name(),
            'location' => fake()->city()
        ];
    }
}
