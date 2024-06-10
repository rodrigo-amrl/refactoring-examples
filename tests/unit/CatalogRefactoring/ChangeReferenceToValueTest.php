<?php

use App\CatalogRefactoring\ChangeReferenceToValue\PersonOld;
use PHPUnit\Framework\TestCase;

final class ChangeReferenceToValueTest extends TestCase
{


    public function testSetNumberOld()
    {

        $person = new PersonOld();
        $person->setOfficeNumber("3322222");

        $this->assertEquals("3322222", $person->getOfficeNumber());
    }
    public function testSetNumberRefactored()
    {

        $person = new PersonOld();
        $person->setOfficeNumber("3322222");

        $this->assertEquals("3322222", $person->getOfficeNumber());
    }
}
