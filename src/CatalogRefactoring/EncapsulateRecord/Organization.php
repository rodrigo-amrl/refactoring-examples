<?php

namespace App\CatalogRefactoring\EncapsulateRecord;

class Organization
{

    public function __construct(
        private string $name,
        private string $country
    ) {
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getCountry()
    {
        return $this->country;
    }
    public function setCountry($country)
    {
        $this->country = $country;
    }

}
