<?php

namespace App\CatalogRefactoring\InlineFunction;


class ReportOld
{

    private array $lines;
    public function reportLines($aCustomer)
    {
        $this->lines = [];
        $this->gaterCustomerData($aCustomer);
        return $this->lines;
    }
    private function gaterCustomerData($aCustomer)
    {
        $this->lines['name'] = $aCustomer['name'];
        $this->lines['location'] = $aCustomer['location'];
    }
}
