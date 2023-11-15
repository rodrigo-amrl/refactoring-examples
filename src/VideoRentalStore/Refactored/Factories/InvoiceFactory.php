<?php

namespace App\VideoRentalStore\Refactored\Factories;

class InvoiceFactory
{

    public static function make()
    {
        $decoded = json_decode('[
            {
            "customer": "BigCo",
            "performances": [
            {
            "playID": "hamlet",
            "audience": 55
            },
            {
            "playID": "as-like",
            "audience": 35
            },
            {
            "playID": "othello",
            "audience": 40
            }]
            }
            ]');

        return $decoded[0];
    }
}
