<?php

namespace App\CatalogRefactoring\IntroduceParameterObject\Factories;


class StationFactory
{

    public static function make()
    {
        return [
            'name' => 'ZB1',
            'readings' => [
                ["temp" => -5, "time" => "2024-01-03 09:10"],
                ["temp" => 10, "time" => "2024-01-03 09:20"],
                ["temp" => 50, "time" => "2024-01-03 09:30"],
                ["temp" => 30, "time" => "2024-01-03 09:40"],
                ["temp" => 45, "time" => "2024-01-03 09:50"],
            ]
        ];
    }
}
