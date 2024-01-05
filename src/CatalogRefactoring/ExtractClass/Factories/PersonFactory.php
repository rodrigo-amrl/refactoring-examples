<?php

namespace App\CatalogRefactoring\ExtractClass\Factories;

class PersonFactory
{

    public static function make()
    {
        return [
            "name" => fake()->name(),
            "office_area_code" => fake()->areaCode(),
            'office_number' => fake()->cellPhone()
        ];
    }
}
