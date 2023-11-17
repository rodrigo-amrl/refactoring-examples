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
    private function volumeCreditsFor(object $performance)
    {
        $resultado = 0;
        $resultado += max($performance->audience - 30, 0);
        if ($performance->play->type === "comedy") {
            $resultado += floor($performance->audience / 5);
        }
        return $resultado;
    }
    private function enrichPerformance(object $performance)
    {
        $performanceCalculator = new PerformanceCalculator($performance, $this->playFor($performance));
        $performance->play = $performanceCalculator->play;
        $performance->amount = $performanceCalculator->getAmount();
        $performance->volumeCredits = $this->volumeCreditsFor($performance);
        return (object) $performance;
    }


    private function playFor($performance)
    {
        $plays_array = (array) $this->plays;
        return  $plays_array[$performance->playID];
    }
}
