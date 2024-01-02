<?php

namespace App\CatalogRefactoring\ChangeFunctionDeclaration;

class CustomerOld
{

    public function __construct(protected array $customers)
    {
    }
    public function getEnglanders(): array
    {
        return array_filter($this->customers, "self::englander");
    }
    private function englander($customer)
    {
        return in_array($customer['address']['state_code'], ["MA", "CT", "ME", "VT", "NH", "RI"]);
    }
}
