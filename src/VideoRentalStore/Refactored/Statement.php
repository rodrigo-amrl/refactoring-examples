<?php

namespace App\VideoRentalStore\Refactored;

use NumberFormatter;

class Statement
{

    public  function statement($invoice, $plays)
    {
        $statamentData = new StatementData($plays);
        return $this->renderPlainText($statamentData->create($invoice));
    }
    private function renderPlainText(object $data)
    {
        $result = "Statement for " . $data->customer . "\n";
        foreach ($data->performances as $perf) {
            $result .= " " . $perf->play->name . ": " . $this->formatNumber($perf->amount) . " (" . $perf->audience . " seats)\n";
        }
        $result .= "Amount owed is " . $this->formatNumber($data->totalAmount) . "\n";
        $result .= "You earned " . $data->totalVolumeCredits . " credits\n";;

        return $result;
    }
    public function htmlStatement($invoice, $plays)
    {
        $statamentData = new StatementData($plays);
        return $this->renderHtml($statamentData->create($invoice));
    }
    private function renderHtml($data)
    {
        $result = "<h1>Statement for {$data->customer}</h1>\n";
        $result .= "<table>";
        $result .= "<tr><th>play</th><th>seats</th><th>cost</th></tr>";
        foreach ($data->performances as $performance) {
            $result .= " <tr><td>{$performance->play->name}</td><td>{$performance->audience}</td>";
            $result .= "<td>{$this->formatNumber($performance->amount)}</td></tr>\n";
        }
        $result .= "</table>\n";
        $result .= "<p>Amount owed is <em>{$this->formatNumber($data->totalAmount)}</em></p>\n";
        $result .= "<p>You earned <em>{$data->totalVolumeCredits}</em> credits</p>\n";

        return $result;
    }
    private function formatNumber(float $number)
    {
        $format = new NumberFormatter("en_US", NumberFormatter::CURRENCY);
        return  $format->formatCurrency($number / 100, "USD");
    }
}
