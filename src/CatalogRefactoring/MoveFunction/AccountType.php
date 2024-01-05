<?php

namespace App\CatalogRefactoring\MoveFunction;

class AccountType
{

    public function __construct(
        private bool $is_premium
    ) {
    }
    public function getOverDraftCharge($days_over_drawn): float
    {
        if ($this->is_premium) {
            $base_charge = 10;
            if ($days_over_drawn <= 7)
                return $base_charge;
            else
                return $base_charge + ($days_over_drawn - 7) * 0.85;
        } else
            return $days_over_drawn * 1.75;
    }
}
