<?php

namespace App\CatalogRefactoring\RenameField;

class Organization
{
    private string $title;
    private string $country;
    public function __construct(array $data)
    {
        $this->title = $data['title'];
        $this->country = $data['country'];
    }

    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($new_title)
    {
        $this->title = $new_title;
    }
    public function getCountry()
    {
        return $this->country;
    }
    public function setCountry($new_country)
    {
        $this->country = $new_country;
    }
}
