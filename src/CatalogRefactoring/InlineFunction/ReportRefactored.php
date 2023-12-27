<?php

namespace App\CatalogRefactoring\InlineFunction;


class ReportRefactored
{

    private array $lines = [];
    public function reportLines($aCustomer)
    {
        $this->lines['name'] = $aCustomer['name'];
        $this->lines['location'] = $aCustomer['location'];
        return $this->lines;
    }
}
