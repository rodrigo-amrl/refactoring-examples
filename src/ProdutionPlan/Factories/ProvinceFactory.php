<?php

namespace App\ProdutionPlan\Factories;

class ProvinceFactory
{

    public static function make()
    {
        return [
            'name' => "Asia",
            'producers' => [
                ['name' => "Byzantium", "cost" => 10, "production" => 9],
                ['name' => "Attalia", "cost" => 12, "production" => 10],
                ['name' => "Sinope", "cost" => 10, "production" => 6]
            ],
            'demand' => 30,
            'price' => 20
        ];
    }
    public static function makeNoProducers()
    {
        return [
            'name' => "No producers",
            'producers' => [],
            'demand' => 30,
            'price' => 20
        ];
    }
    public static function makeStringProducers()
    {
        return [
            'name' => "No producers",
            'producers' => "",
            'demand' => 30,
            'price' => 20
        ];
    }
}
