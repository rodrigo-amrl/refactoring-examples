<?php

namespace App\VideoRentalStore\Refactored;

use Exception;
use NumberFormatter;

class PrintBill
{
    public function __construct(protected object $plays)
    {
    }
    function statement($invoice)
    {

        $totalAmount = 0;
        $volumeCredits = 0;
        $result = "Statement for " . $invoice->customer . "\n";
        $format = new NumberFormatter("en_US", NumberFormatter::CURRENCY);

        foreach ($invoice->performances as $perf) {
            $volumeCredits += max($perf->audience - 30, 0);
            if ($this->playFor($perf)->type === "comedy") {
                $volumeCredits += floor($perf->audience / 5);
            }
            $result .= " " . $this->playFor($perf)->name . ": " . $format->formatCurrency($this->amountFor($perf) / 100, "USD") . " (" . $perf->audience . " seats)\n";
            $totalAmount += $this->amountFor($perf);
        }

        $result .= "Amount owed is " . $format->formatCurrency($totalAmount / 100, "USD") . "\n";
        $result .= "You earned " . $volumeCredits . " credits\n";;
        return $result;
    }
    private function amountFor($performance)
    {
        $result = 0;
        switch ($this->playFor($performance)->type) {

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
                throw new Exception("unknown type: " . $this->playFor($performance)->type);
        }
        return $result;
    }
    private function playFor($performance)
    {
        $plays_array = (array) $this->plays;
        return  $plays_array[$performance->playID];
    }
}
