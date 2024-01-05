<?php

namespace App\CatalogRefactoring\MoveField\Account;

class AccountTypeRefactored
{

    public function __construct(
        private string $name,
        private int $interest_rate
    ) {
    }
    public function getInterestRate()
    {
        return $this->interest_rate;
    }

}
