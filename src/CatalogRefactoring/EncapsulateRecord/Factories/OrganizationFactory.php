<?php

namespace App\CatalogRefactoring\EncapsulateRecord\Factories;

class OrganizationFactory
{

    public static function make()
    {
        return [
            'name' => "Acme Gooseberries",
            'country' => "GB"
        ];
    }
}
