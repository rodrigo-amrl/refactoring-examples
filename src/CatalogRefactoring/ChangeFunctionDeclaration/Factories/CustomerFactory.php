<?php

namespace App\CatalogRefactoring\ChangeFunctionDeclaration\Factories;

class CustomerFactory
{

    public static function make()
    {
        return [
            ['name' => fake()->name(), 'address' => AddressFactory::make()],
            ['name' => fake()->name(), 'address' => AddressFactory::make()],
            ['name' => fake()->name(), 'address' => AddressFactory::make()],
         
        ];
    }
}
