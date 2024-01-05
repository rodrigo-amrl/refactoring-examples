<?php

namespace App\CatalogRefactoring\MoveField\Account;


class AccountRefactored
{

    public function __construct(
        private float $number,
        private AccountTypeRefactored $type
    ) {
    }
    public function getInterestRate()
    {
        return $this->type->getInterestRate();
    }
}
