<?php

namespace App\CatalogRefactoring\CombineFunctionIntoTransform\Factories;


class ReadingFactory
{

    public static function make()
    {
        return [
            'customer' => fake()->name(),
            'quantity' => 10,
            'month' => 1,
            'year' => 2024
        ];
    }
}
