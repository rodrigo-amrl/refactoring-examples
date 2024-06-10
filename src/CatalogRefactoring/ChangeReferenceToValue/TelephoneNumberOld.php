<?php


namespace App\CatalogRefactoring\ChangeReferenceToValue;

class TelephoneNumberOld
{
    private int $area_code;
    private string $number;
    public function __construct()
    {
    }

    public function getAreaCode()
    {
        return $this->area_code;
    }
    public function setAreaCode($new_area_code)
    {
        $this->area_code = $new_area_code;
    }
    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($new_number)
    {
        $this->number = $new_number;
    }
}
