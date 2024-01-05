<?php

namespace App\CatalogRefactoring\MoveField\Customer;

class CustomerContractRefactored
{

    public function __construct(
        private string $start_date,
        private float $discount_rate
    ) {
    }
    public function getDiscountRate()
    {
        return $this->discount_rate;
    }
    public function setDiscountRate($value)
    {
        $this->discount_rate = $value;
    }
}
