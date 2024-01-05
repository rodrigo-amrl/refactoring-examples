<?php

use App\CatalogRefactoring\HideDelegate\PersonRefactored;
use PHPUnit\Framework\TestCase;

final class HideDelegateTest extends TestCase
{
    public function testGetDepartamentManager()
    {
        $person = new PersonRefactored("Rodrigo");
        $this->assertEquals($person->getManager(), "Rodrigo");
    }
}
