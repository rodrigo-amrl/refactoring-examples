<?php

namespace App\CatalogRefactoring\ExtractClass;

class TelefoneNumber
{

    public function __construct(
        private int $area_code,
        private string $number
    ) {
    }
    public function toString()
    {
        return "({$this->area_code}) {$this->number}";
    }
    public function getAreaCode()
    {
        return $this->area_code;
    }
    public function setAreaCode($area_code)
    {
        $this->area_code = $area_code;
    }
    public function getNumber()
    {
        return $this->number;
    }
    public function setNumber($number)
    {
        $this->number = $number;
    }
}
