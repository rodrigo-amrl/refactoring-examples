<?php

namespace App\CatalogRefactoring\EncapsulateRecord;

use App\CatalogRefactoring\EncapsulateRecord\Factories\CustomerFactory;

class CustomerUsageOld
{

    private $customers;
    public function __construct()
    {
        $this->customers = CustomerFactory::make();
    }
    public function compareUsage($customer_id, $later_year, $month)
    {
        $later = $this->customers[$customer_id]['usages'][$later_year][$month];
        $earlier = $this->customers[$customer_id]['usages'][$later_year - 1][$month];
        return ['later_amount' => $later, 'change' => $earlier];
    }
    public function setUsage($customer_id, $year, $month, $amount)
    {
        $this->customers[$customer_id]['usages'][$year][$month] = $amount;
    }
}
