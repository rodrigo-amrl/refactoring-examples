<?php

namespace App\VideoRentalStore\Refactored;

use Exception;

class PerformanceCalculator
{
    public function __construct(protected object $performance, public object $play)
    {
    }
    public function getAmount()
    {
        $result = 0;
        switch ($this->performance->play->type) {

            case "tragedy":
                $result = 40000;
                if ($this->performance->audience > 30) {
                    $result += 1000 * ($this->performance->audience - 30);
                }
                break;
            case "comedy":
                $result = 30000;
                if ($this->performance->audience > 20) {
                    $result += 10000 + 500 * ($this->performance->audience - 20);
                }
                $result += 300 * $this->performance->audience;
                break;
            default:
                throw new Exception("unknown type: " . $this->performance->play->type);
        }
        return $result;
    }
}
