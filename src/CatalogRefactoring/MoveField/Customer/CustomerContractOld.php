<?php

namespace App\CatalogRefactoring\MoveField\Customer;

class CustomerContract
{

    public function __construct(
        private string $start_date
    ) {
    }
}
