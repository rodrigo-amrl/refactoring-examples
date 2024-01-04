<?php

namespace App\CatalogRefactoring\EncapsulateCollection\Refactored;


class Course
{

    public function __construct(
        private string $name,
        private bool $advanced
    ) {
    }
    public function getName()
    {
        return $this->name;
    }
    public function isAdvanced()
    {
        return !!$this->advanced;
    }
}
