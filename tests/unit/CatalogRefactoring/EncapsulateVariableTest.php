<?php

declare(strict_types=1);

use App\CatalogRefactoring\EncapsulateVariable\Factories\OwnerFactory;
use App\CatalogRefactoring\EncapsulateVariable\SpaceshipOld;
use App\CatalogRefactoring\EncapsulateVariable\SpaceshipRefactored;
use PHPUnit\Framework\TestCase;

final class EncapsulateVariableTest extends TestCase
{

    public function testSetDefaultOwner()
    {
        $spaceship = new SpaceshipRefactored('Spaceship 1');
        $new_owner = OwnerFactory::make();
        $spaceship->setDefaultOwer($new_owner);
        $default_owner = $spaceship->getDefaultOwner();
        $this->assertEquals($new_owner, $default_owner);
    }
}
