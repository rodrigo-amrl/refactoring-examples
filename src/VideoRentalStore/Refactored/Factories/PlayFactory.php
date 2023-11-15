<?php

namespace App\VideoRentalStore\Refactored\Factories;


class PlayFactory
{

    public static function make()
    {
        return json_decode('{
            "hamlet": {"name": "Hamlet", "type": "tragedy"},
            "as-like": {"name": "As You Like It", "type": "comedy"},
            "othello": {"name": "Othello", "type": "tragedy"}
            }');
    }
}
