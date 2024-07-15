<?php

use App\CatalogRefactoring\PullUpMethod\DepartamentOld;
use App\CatalogRefactoring\PullUpMethod\DepartamentRefactored;
use App\CatalogRefactoring\PullUpMethod\EmployeeOld;
use App\CatalogRefactoring\PullUpMethod\EmployeeRefactored;
use PHPUnit\Framework\TestCase;

final class PullUpMethodTest extends TestCase
{

    public function testGetAnnualCostOld()
    {
        $employee =  new EmployeeOld();
        $this->assertEquals(3360.0, $employee->getAnnualCost());

        $employee =  new DepartamentOld();
        $this->assertEquals(10560.0, $employee->getTotalAnnualCost());
    }
    public function testGetAnnualCostRefactored()
    {
        $employee =  new EmployeeRefactored();
        $this->assertEquals(3360.0, $employee->getAnnualCost());

        $employee =  new DepartamentRefactored();
        $this->assertEquals(10560.0, $employee->getAnnualCost());
    }
}
