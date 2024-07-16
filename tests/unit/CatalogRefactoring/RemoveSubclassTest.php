<?php

use App\CatalogRefactoring\RemoveSubclass\PersonOld;
use App\CatalogRefactoring\RemoveSubclass\PersonRefactored;
use PHPUnit\Framework\TestCase;

final class RemoveSubclassTest extends TestCase
{

    public function testGetGenderPersonOld()
    {

        $person = PersonOld::createPerson((object)['name' => "Anderson", 'gender' => "M"]);
        $this->assertEquals("M", $person->getGenderCode());
    }
    public function testGetGenderPersonRefactored()
    {

        $person = PersonRefactored::createPerson((object)['name' => "Anderson", 'gender' => "M"]);
        $this->assertEquals("M", $person->getGenderCode());
    }
}
