<?php

namespace App\VideoRentalStore\Refactored;

use Exception;

class StatementData
{
    public function __construct(protected object $plays)
    {
    }
    public function create(object $invoice)
    {
        $statement_data = (object)['customer' => $invoice->customer];
        $statement_data->performances = array_map('self::enrichPerformance', $invoice->performances);
        $statement_data->totalAmount = $this->totalAmount($statement_data);
        $statement_data->totalVolumeCredits = $this->totalVolumeCredits($statement_data);

        return $statement_data;
    }
    private function totalAmount(object $data)
    {
        return array_reduce($data->performances, fn ($result, $performance): float => $result += $performance->amount, 0);
    }
    private function totalVolumeCredits(object $data)
    {
        return array_reduce($data->performances, fn ($result, $performance): float => $result += $performance->amount, 0);
    }

    private function enrichPerformance(object $performance)
    {
        $performanceCalculator = $this->createPerformanceCalculator($performance, $this->playFor($performance));
        $performance->play = $performanceCalculator->play;
        $performance->amount = $performanceCalculator->amount();
        $performance->volumeCredits = $performanceCalculator->volumeCredits();
        return (object) $performance;
    }

    private function createPerformanceCalculator($performance, $play)
    {

        switch ($play->type) {
            case "tragedy":
                return new TragedyCalculator($performance, $play);
                break;
            case 'comedy':
                return new ComedyCalculator($performance, $play);
            default:
                throw new Exception("unknown type: " . $performance->play->type);
        }
    }
    private function playFor($performance)
    {
        $plays_array = (array) $this->plays;
        return  $plays_array[$performance->playID];
    }
}
