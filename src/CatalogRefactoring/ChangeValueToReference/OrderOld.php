<?php

namespace App\CatalogRefactoring\ChangeValueToReference;


class OrderOld
{

    private int $number;
    private Customer $customer;
    public function __construct($data)
    {
        $this->number = $data['number'];
        $this->customer = new Customer($data['customer']);
    }
    public function getCustomer()
    {
        return $this->customer;
    }
}
