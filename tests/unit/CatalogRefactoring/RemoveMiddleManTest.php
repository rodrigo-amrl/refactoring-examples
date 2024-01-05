<?php

use App\CatalogRefactoring\RemoveMiddleMan\PersonRefactored;
use PHPUnit\Framework\TestCase;

final class RemoveMiddleManTest extends TestCase
{
    public function testGetDepartamentManager()
    {
        $person = new PersonRefactored("Rodrigo");
        $this->assertEquals($person->getDepartament()->getManager(), "Rodrigo");
    }
}
