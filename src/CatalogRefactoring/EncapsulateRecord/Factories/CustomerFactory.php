<?php

namespace App\CatalogRefactoring\EncapsulateRecord\Factories;

class CustomerFactory
{

    public static function make()
    {
        return [
            "1920" => [
                "name" => "martin",
                "id" => "1920",
                "usages" => [
                    "2016" => [
                        "1" => 50,
                        "2" => 55,
                    ],
                    "2015" => [
                        "1" => 70,
                        "2" => 63,
                    ]
                ]
            ],
            "38673" => [
                "name" => "neal",
                "id" => "38673",
                "usages" => [
                    "2016" => [
                        "1" => 40,
                        "2" => 30,
                    ],
                    "2015" => [
                        "1" => 10,
                        "2" => 50,
                    ]
                ]
            ]

        ];
    }
}
