<?php

namespace App\CatalogRefactoring\EncapsulateRecord;

class CustomerData
{

    public function __construct(protected array $data)
    {
    }
    public function setUsage($customer_id, $year, $month, $amount)
    {
        $this->data[$customer_id]['usages'][$year][$month] = $amount;
    }
    public function usage($customer_id, $year, $month)
    {
        return $this->data[$customer_id]['usages'][$year][$month];
    }
}
