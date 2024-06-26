<?php

use App\CatalogRefactoring\RemoveSettingMethod\PersonOld;
use App\CatalogRefactoring\RemoveSettingMethod\PersonRefactored;
use PHPUnit\Framework\TestCase;

final class RemoveSettingMethodTest extends TestCase
{

    public function testCreatePersonOld()
    {

        $person = new PersonOld();
        $person->setName('Rodrigo');
        $person->setId(33);

        $this->assertEquals(33, $person->getId());
        $this->assertEquals('Rodrigo', $person->getName());
    }
    public function testCreatePersonRefactored()
    {

        $person = new PersonRefactored(id: 33);
        $person->setName('Rodrigo');

        $this->assertEquals(33, $person->getId());
        $this->assertEquals('Rodrigo', $person->getName());
    }
}
