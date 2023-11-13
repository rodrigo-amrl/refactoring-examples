<?php

namespace App\VideoRentalStore\Old;

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
            $thisAmount = 0;

            switch ($play['type']) {
                case "tragedy":
                    $thisAmount = 40000;
                    if ($perf['audience'] > 30) {
                        $thisAmount += 1000 * ($perf['audience'] - 30);
                    }
                    break;
                case "comedy":
                    $thisAmount = 30000;
                    if ($perf['audience'] > 20) {
                        $thisAmount += 10000 + 500 * ($perf['audience'] - 20);
                    }
                    $thisAmount += 300 * $perf['audience'];
                    break;
                default:
                    throw new Exception("unknown type: " . $play['type']);
            }

            // Add volume credits
            $volumeCredits += max($perf['audience'] - 30, 0);

            // Add extra credit for every ten comedy attendees
            if ($play['type'] === "comedy") {
                $volumeCredits += floor($perf['audience'] / 5);
            }

            // Print line for this order
            $result .= " " . $play['name'] . ": " . $format->formatCurrency($thisAmount / 100, "USD") . " (" . $perf['audience'] . " seats)\n";
            $totalAmount += $thisAmount;
        }
        print_r($result);die();

        $result .= "Amount owed is " . $format->formatCurrency($totalAmount / 100, "USD") . "\n";
        $result .= "You earned " . $volumeCredits . " credits\n";
        return $result;
    }
}
