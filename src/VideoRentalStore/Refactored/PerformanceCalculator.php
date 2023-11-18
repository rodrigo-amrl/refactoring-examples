<?php

namespace App\VideoRentalStore\Refactored;

use Exception;

class PerformanceCalculator
{
    public function __construct(protected object $performance, public object $play)
    {
    }
    public function amount()
    {
        throw new Exception('Subclass Responsability');
    }
    public function volumeCredits()
    {
        return max($this->performance->audience - 30, 0);
    }
}
