<?php

namespace App\VideoRentalStore\Factories;

class InvoiceFactory
{

    public static function make()
    {
        return json_decode('[
            {
            "customer": "BigCo",
            "performances": [
            {
            "playID": "hamlet",
            "audience": 55
            },
            {
            "playID": "as­like",
            "audience": 35
            },
            {
            "playID": "othello",
            "audience": 40
            }]
            }
            ]');
    }
}
