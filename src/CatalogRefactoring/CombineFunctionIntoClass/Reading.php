<?php

namespace App\CatalogRefactoring\CombineFunctionIntoClass;

class Reading
{

    public function __construct(
        private string $customer,
        private int $quantity,
        private int $month,
        private int $year
    ) {
    }

    public function getCustomer()
    {
        return $this->customer;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }
    public function getMonth()
    {
        return $this->month;
    }
    public function getYear()
    {
        return $this->year;
    }
    public function baseCharge()
    {
        return round($this->baseRate($this->getMonth(), $this->getYear()) * $this->getQuantity(),3);
    }
    private function baseRate($month, $year)
    {
        return $month / $year;
    }
    public function taxableCharge()
    {
        return max(0, $this->baseCharge() - $this->taxThreshold($this->getYear()));
    }
    private function taxThreshold($year)
    {
        return $year > 2023 ? 0.5 : 0.2;
    }
}
