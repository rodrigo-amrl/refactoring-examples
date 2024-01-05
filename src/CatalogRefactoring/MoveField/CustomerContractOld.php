<?php

namespace App\CatalogRefactoring\MoveField;

class CustomerContract
{

    public function __construct(
        private string $start_date
    ) {
    }
}
