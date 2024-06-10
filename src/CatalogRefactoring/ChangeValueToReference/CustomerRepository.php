<?php

namespace App\CatalogRefactoring\ChangeValueToReference;


class CustomerRepository
{



    public function __construct(
        private array $customers = [],

    ) {
    }
    public function registerCustomer($id)
    {
        if (!$this->hasCustomer($id))
            $this->customers[] = new Customer($id);

        return $this->findCustomer($id);
    }
    private function hasCustomer($id)
    {
        return !empty($this->findCustomer($id));
    }
    private function findCustomer($id)
    {
        $customer = [];
        foreach ($this->customers as $value) {
            if ($value->getId() == $id) {
                $customer = $value;
                break;
            }
        }

        return $customer;
    }
}
