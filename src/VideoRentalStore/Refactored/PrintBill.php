<?php

namespace App\VideoRentalStore\Refactored;

use Exception;
use NumberFormatter;

class PrintBill
{
    public function __construct(protected object $plays)
    {
    }

    public  function statement($invoice)
    {
        $statement_data = (object)['customer' => $invoice->customer];
        $statement_data->performances = array_map('self::makePerformance', $invoice->performances);

        return $this->renderPlainText($statement_data);
    }
    private function makePerformance(object $performance)
    {
        $performance->play = $this->playFor($performance);
        $performance->amount = $this->amountFor($performance);
        $performance->volumeCredits = $this->volumeCreditsFor($performance);
        return (object) $performance;
    }
    private function renderPlainText(object $data)
    {
        $result = "Statement for " . $data->customer . "\n";
        foreach ($data->performances as $perf) {
            $result .= " " . $perf->play->name . ": " . $this->formatNumber($perf->amount) . " (" . $perf->audience . " seats)\n";
        }
        $result .= "Amount owed is " . $this->formatNumber($this->totalAmount($data)) . "\n";
        $result .= "You earned " . $this->totalVolumeCredits($data) . " credits\n";;

        return $result;
    }

    private function totalAmount(object $invoice)
    {
        $result = 0;
        foreach ($invoice->performances as $perf) {
            $result += $perf->amount;
        }
        return $result;
    }
    private function totalVolumeCredits(object $invoice)
    {
        $result = 0;
        foreach ($invoice->performances as $perf) {
            $result = $perf->volumeCredits;
        }
        return $result;
    }
    private function formatNumber(float $number)
    {
        $format = new NumberFormatter("en_US", NumberFormatter::CURRENCY);
        return  $format->formatCurrency($number / 100, "USD");
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
