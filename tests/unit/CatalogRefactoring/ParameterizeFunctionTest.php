<?php

use App\CatalogRefactoring\ParameterizeFunction\ChargeOld;
use App\CatalogRefactoring\ParameterizeFunction\ChargeRefactored;
use App\CatalogRefactoring\ParameterizeFunction\PersonOld;
use App\CatalogRefactoring\ParameterizeFunction\PersonRefactored;
use PHPUnit\Framework\TestCase;

final class ParameterizeFunctionTest extends TestCase
{

    public function testSettenPercentRaiseOld()
    {

        $person = new PersonOld();
        $result = $person->tenPercentRaise(['salary' => 9]);

        $this->assertEquals(9.9,  $result['salary']);
    }
    public function testSettenPercentRaiseRefactored()
    {

        $person = new PersonRefactored();
        $result = $person->raise(['salary' => 9], 1.1);

        $this->assertEquals(9.9,  $result['salary']);
    }
    public function testGetBaseChargeOld()
    {

        $charge = new ChargeOld();
        $result = $charge->baseCharge(120);

        $this->assertEquals(4,  $result);
    }
    public function testGetBaseChargeRefactored()
    {

        $charge = new ChargeRefactored();
        $result = $charge->baseCharge(120);

        $this->assertEquals(4,  $result);
    }
}
