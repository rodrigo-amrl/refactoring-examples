<?php

namespace App\CatalogRefactoring\ChangeValueToReference;


class OrderRefactored
{

    private int $number;
    private Customer $customer;
    public function __construct($data)
    {
        $this->number = $data['number'];
        $customerRepository = new CustomerRepository();
        $this->customer = $customerRepository->registerCustomer($data['customer']);
    }
    public function getCustomer()
    {
        return $this->customer;
    }
}
