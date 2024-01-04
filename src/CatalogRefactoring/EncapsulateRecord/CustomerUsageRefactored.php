<?php

namespace App\CatalogRefactoring\EncapsulateRecord;

use App\CatalogRefactoring\EncapsulateRecord\Factories\CustomerFactory;

class CustomerUsageRefactored
{

    private $customer_data;
    public function __construct()
    {
        $this->setCustomerData();
    }
    private function setCustomerData()
    {
        $this->customer_data = new CustomerData(CustomerFactory::make());
    }
    public function compareUsage($customer_id, $later_year, $month)
    {
        $later = $this->getCustomers()->usage($customer_id, $later_year, $month);
        $earlier = $this->getCustomers()->usage($customer_id, $later_year - 1, $month);
        return ['later_amount' => $later, 'change' => $earlier];
    }
    private function getCustomers()
    {
        return $this->customer_data;
    }
    public function setUsage($customer_id, $year, $month, $amount)
    {
        $this->getCustomers()->setUsage($customer_id, $year, $month, $amount);
    }
}
