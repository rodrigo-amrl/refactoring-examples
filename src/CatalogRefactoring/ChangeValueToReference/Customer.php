<?php

namespace App\CatalogRefactoring\ChangeValueToReference;


class Customer
{

    public function __construct(
        private int $id
    ) {
    }

    public function getId()
    {
        return $this->id;
    }
}
