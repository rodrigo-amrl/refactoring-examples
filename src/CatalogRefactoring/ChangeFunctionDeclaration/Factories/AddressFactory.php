<?php

namespace App\CatalogRefactoring\ChangeFunctionDeclaration\Factories;

class AddressFactory
{

    public static function make()
    {
        return [
            'state' => fake()->state(),
            'state_code' => fake()->randomElements(["MA", "CT", "ME", "VT", "NH", "RI"])[0],
            'city' => fake()->city(),
        ];
    }
}
