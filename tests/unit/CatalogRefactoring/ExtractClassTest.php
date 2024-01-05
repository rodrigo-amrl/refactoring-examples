<?php

use App\CatalogRefactoring\ExtractClass\Factories\PersonFactory;
use App\CatalogRefactoring\ExtractClass\PersonRefactored;
use PHPUnit\Framework\TestCase;

final class ExtractClassTest extends TestCase
{
    public function testGetPersonTelephoneNumber()
    {

        $person = PersonFactory::make();
        $person = new PersonRefactored(...$person);
        $telephone = $person->getTelephoneNUmber();

        $this->assertStringContainsString("({$person->getOfficeAreaCode()})", $telephone);
        $this->assertStringContainsString($person->getOfficeNumber(), $telephone);
    }
}
