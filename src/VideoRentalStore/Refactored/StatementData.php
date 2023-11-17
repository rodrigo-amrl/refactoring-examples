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
    private function enrichPerformance(object $performance)
    {
        $performance->play = $this->playFor($performance);
        $performance->amount = $this->amountFor($performance);
        $performance->volumeCredits = $this->volumeCreditsFor($performance);
        return (object) $performance;
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
    private function amountFor(object $performance)
    {
        $result = 0;
        switch ($performance->play->type) {

            case "tragedy":
                $result = 40000;
                if ($performance->audience > 30) {
                    $result += 1000 * ($performance->audience - 30);
                }
                break;
            case "comedy":
                $result = 30000;
                if ($performance->audience > 20) {
                    $result += 10000 + 500 * ($performance->audience - 20);
                }
                $result += 300 * $performance->audience;
                break;
            default:
                throw new Exception("unknown type: " . $performance->play->type);
        }
        return $result;
    }
    private function playFor($performance)
    {
        $plays_array = (array) $this->plays;
        return  $plays_array[$performance->playID];
    }
}
