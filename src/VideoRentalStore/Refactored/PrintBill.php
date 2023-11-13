<?php

namespace App\VideoRentalStore\Refactored;

use Exception;
use NumberFormatter;

class PrintBill
{
    function statement($invoice, $plays)
    {

        $totalAmount = 0;
        $volumeCredits = 0;
        $result = "Statement for " . $invoice['customer'] . "\n";
        $format = new NumberFormatter("en_US", NumberFormatter::CURRENCY);

        foreach ($invoice['performances'] as $perf) {
            $play = $plays[$perf['playID']];
            $amount = $this->amountFor($perf, $play);
            $volumeCredits += max($perf['audience'] - 30, 0);
            if ($play['type'] === "comedy") {
                $volumeCredits += floor($perf['audience'] / 5);
            }
            $result .= " " . $play['name'] . ": " . $format->formatCurrency($amount / 100, "USD") . " (" . $perf['audience'] . " seats)\n";
            $totalAmount += $amount;
        }


        $result .= "Amount owed is " . $format->formatCurrency($totalAmount / 100, "USD") . "\n";
        $result .= "You earned " . $volumeCredits . " credits\n";;
        return $result;
    }
    private function amountFor($perf, $play)
    {
        $amount = 0;
        switch ($play['type']) {

            case "tragedy":
                $amount = 40000;
                if ($perf['audience'] > 30) {
                    $amount += 1000 * ($perf['audience'] - 30);
                }
                break;
            case "comedy":
                $amount = 30000;
                if ($perf['audience'] > 20) {
                    $amount += 10000 + 500 * ($perf['audience'] - 20);
                }
                $amount += 300 * $perf['audience'];
                break;
            default:
                throw new Exception("unknown type: " . $play['type']);
        }
        return $amount;
    }
}
