<?php

namespace App\CatalogRefactoring\ExtractFunction;

class Old
{

    public function PrintOwing($invoice)
    {
        $outstanding = 0;

        echo "***************************";
        echo "****** Customer Owes ******";
        echo "***************************";

        //calculate outstanding
        foreach ($invoice['orders'] as $o) {
            $outstanding += $o['amount'];
        }

        //record due date
        $today = date('Y-d-m');
        $invoice['due_date'] = date('Y-d-m', strtotime("+5 days " . $today));

        //print details
        echo "Name: " . $invoice['customer'];
        echo "Amount: " . $outstanding;
        echo "Due: " . $invoice['due_date'];
    }
}
