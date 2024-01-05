<?php

namespace App\CatalogRefactoring\MoveField\Account;


class AccountOld
{

    public function __construct(
        private float $number,
        private AccountTypeOld $type,
        private int $interest_rate
    ) {
    }
    public function getInterestRate()
    {
        return $this->interest_rate;
    }
}
